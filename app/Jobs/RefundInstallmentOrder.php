<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Installment;
use App\Models\InstallmentItem;
use App\Models\Order;
use App\Exceptions\InternalException;

// ShouldQueue 代表这是一个异步任务
class RefundInstallmentOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 如果商品订单支付方式不是分期付款、订单未支付、订单退款状态不是退款中，则不执行后面的逻辑
        if ($this->order->payment_method !== 'installment'
            || !$this->order->paid_at
            || $this->order->refund_status !== Order::REFUND_STATUS_PROCESSING) {
            return;
        }
        // 找不到对应的分期付款，原则上不可能出现这种情况，这里的判断只是增加代码健壮性
        if (!$installment = Installment::query()->where('order_id', $this->order->id)->first()) {
            return;
        }
        // 遍历对应分期付款的所有还款计划
        foreach ($installment->items as $item) {
            // 如果还款计划未支付，或者退款状态为退款成功或退款中，则跳过
            if (!$item->paid_at || in_array($item->refund_status, [
                InstallmentItem::REFUND_STATUS_SUCCESS,
                InstallmentItem::REFUND_STATUS_PROCESSING,
            ])) {
                continue;
            }
            // 调用具体的退款逻辑
            try {
                $this->refundInstallmentItem($item);
            } catch (\Exception $e) {
                \Log::warning('分期退款失败：' . $e->getMessage(), [
                    'installment_item_id' => $item->id,
                ]);
                // 假如某个还款计划退款报错了，则暂时跳过，继续处理下一个还款计划的退款
                continue;
            }
        }
        $installment->refreshRefundStatus();
    }

    protected function refundInstallmentItem(InstallmentItem $item)
    {
        // 退款单号使用商品订单的退款号与当前还款计划的序号拼接而成
        $refundNo = $this->order->refund_no . '_' . $item->sequence;
        // 根据还款计划的支付方式执行对应的退款逻辑
        switch ($item->payment_method) {
            case 'wechat':
                app('wechat_pay')->refund([
                    // 这里使用微信订单号来退款
                    'transaction_id' => $item->payment_no,
                    // 原订单金额，单位分
                    'total_fee' => $item->total * 100,
                    // 要退款的订单金额，单位分，分期付款的退款只退本金
                    'refund_fee' => $item->base * 100,
                    // 退款订单号
                    'out_refund_no' => $refundNo,
                    // 微信支付的退款结果并不是实时返回的，而是通过退款回调来通知，因此这里需要配上退款回调接口地址
                    'notify_url' => ngrok_url('installments.wechat.refund_notify'),
                ]);
                // 将还款计划退款状态改为退款中
                $item->update([
                    'refund_status' => InstallmentItem::REFUND_STATUS_PROCESSING,
                ]);
                break;
            case 'alipay':
                $ret = app('alipay')->refund([
                    // 使用支付宝交易号来退款
                    'trade_no' => $item->payment_no,
                    // 退款金额，单位元，只退回本金
                    'refund_amount' => $item->base,
                    // 退款订单号
                    'out_request_no' => $refundNo,
                ]);
                // 根据支付宝的文档，如果返回值里有 sub_code 字段说明退款失败
                if ($ret->sub_code) {
                    $item->update([
                        'refund_status' => InstallmentItem::REFUND_STATUS_FAILED,
                    ]);
                } else {
                    // 将订单的退款状态标记为退款成功并保存退款订单号
                    $item->update([
                        'refund_status' => InstallmentItem::REFUND_STATUS_SUCCESS,
                    ]);
                }
                break;
            default:
                // 原则上不可能出现，这个只是为了代码健壮性
                throw new InternalException('未知订单支付：' . $item->paytment_method);
                break;
        }
    }
}
<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CrowdfundingProduct;
use App\Models\Order;
use App\Services\OrderService;

// ShouldQueue 代表此任务需要异步执行
class RefundCrowdfundingOrders implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $crowdfunding;

    /**
     * Create a new job instance.
     */
    public function __construct(CrowdfundingProduct $crowdfunding)
    {
        $this->crowdfunding = $crowdfunding;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        logger($this->crowdfunding);
        // 如果众筹的状态不是失败则不执行退款，原则上不会发生，这里只是增加健壮性
        if (CrowdfundingProduct::STATUS_FAIL !== $this->crowdfunding->status) {
            return;
        }

        // 众筹失败退款逻辑
        $orderService = app(OrderService::class);

        // 查询出所有参与了此众筹的订单
        Order::query()
            // 订单类型为众筹商品订单
            ->where('type', Order::TYPE_CROWDFUNDING)
            // 已支付的订单
            ->whereNotNull('paid_at')
            ->whereHas('items', function ($query) {
                // 包含了当前商品
                $query->where('product_id', $this->crowdfunding->product_id);
            })
            ->get()
            ->each(function (Order $order) use ($orderService) {
                // Todo 调用退款逻辑
                $orderService->refundOrder($order);
            });
    }
}

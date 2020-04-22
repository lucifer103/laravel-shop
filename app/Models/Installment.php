<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    const STATUS_PENDING = 'pending';

    const STATUS_REPAYING = 'repaying';

    const STATUS_FINISHED = 'finished';

    public static $statusMap = [
        self::STATUS_PENDING => '未执行',
        self::STATUS_REPAYING => '还款中',
        self::STATUS_FINISHED => '已完成',
    ];

    protected $fillable = ['no', 'total_amount', 'count', 'fee_rate', 'fine_rate', 'status'];

    protected static function boot()
    {
        parent::boot();
        // 监听模型创建事件，在写入数据库之前触发
        static::creating(function ($model) {
            // 如果模型的 no 字段为空
            if (!$model->no) {
                // 调用 findAvailableNo 生成分期流水号
                $model->no = static::findAvailableNo();
                // 如果生成失败，则终止创建订单
                if (!$model->no) {
                    return false;
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function items()
    {
        return $this->hasMany(InstallmentItem::class);
    }

    public static function findAvailableNo()
    {
        // 分期流水号前缀
        $prefix = date('YmdHis');

        for ($i = 0; $i < 10; ++$i) {
            // 随机生成 6 位的数字
            $no = $prefix.str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            // 判断是否已经存在
            if (!static::query()->where('no', $no)->exists()) {
                return $no;
            }
        }
        \Log::warning('find installment no failed');

        return false;
    }

    public function refreshRefundStatus()
    {
        // 设定一个全部退款成功的标志位
        $allSuccess = true;
        // 重新加载 items，保证与数据库中数据同步
        $this->load(['items']);
        foreach ($this->items as $item) {
            if ($item->paid_at && InstallmentItem::REFUND_STATUS_SUCCESS !== $item->refund_status) {
                // 则将标志位记为 false
                $allSuccess = false;

                break;
            }
        }
        // 如果所有退款都成功，则将对应商品订单的退款窗台修改为退款成功
        if ($allSuccess) {
            $this->order->update([
                'refund_status' => Order::REFUND_STATUS_SUCCESS,
            ]);
        }
    }
}

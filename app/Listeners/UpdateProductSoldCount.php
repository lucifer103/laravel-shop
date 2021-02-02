<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\OrderItem;

// implements ShouldQueue 代表此监听器是异步执行的
class UpdateProductSoldCount implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     * Laravel 会默认执行监听器的 handle 方法，触发的事件会作为 handle 方法的参数.
     */
    public function handle(OrderPaid $event)
    {
        // 从事件对象中取出对应的订单
        $order = $event->getOrder();
        // 预加载商品数据
        $order->load('items.product');
        // 循环遍历订单的商品
        foreach ($order->items as $item) {
            $product = $item->product;
            // 计算对应商品的销量
            $soldCount = OrderItem::query()
                ->where('product_id', $product->id)
                ->whereHas('order', function ($query) {
                    // 关联的订单状态是已支付
                    $query->whereNotNull('paid_at');
                })->sum('amount');
            // 更新商品销量
            $product->update([
                'sold_count' => $soldCount,
            ]);
        }
    }
}

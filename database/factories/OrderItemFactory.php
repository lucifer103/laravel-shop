<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use App\Models\OrderItem;
use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(OrderItem::class, function (Faker $faker) {
    // 从数据库随机取一条商品
    $product = Product::query()->where('on_sale', true)->inRandomOrder()->first();
    // 从该商品的 SKU 中随机取一条
    $sku = $product->skus()->inRandomOrder()->first();

    return [
        // 购买数量随机 1 - 5 份
        'amount' => random_int(1, 5),
        'price' => $sku->price,
        'rating' => null,
        'review' => null,
        'reviewed_at' => null,
        'product_id' => $product->id,
        'product_sku_id' => $sku->id,
    ];
});

<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 创建 30 个商品
        $products = factory(\App\Models\Product::class, 30)->create();
        foreach ($products as $product) {
            // 创建 3 个 SKU，并且每个 SKU 的 `product_id` 字段都设为当前循环的商品 id
            $skus = factory(\App\Models\ProductSku::class, 3)->create(['product_id' => $product->id]);
            // 找出价格最低的 SKU 价格，把商品价格设置为该价格
            $product->update(['price' => $skus->min('price')]);
        }
    }
}

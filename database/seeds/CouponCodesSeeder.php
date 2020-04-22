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

class CouponCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\CouponCode::class, 20)->create();
    }
}

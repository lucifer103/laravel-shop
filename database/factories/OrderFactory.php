<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use App\Models\Order;
use Faker\Generator as Faker;
use App\Models\CouponCode;
use App\Models\User;

$factory->define(Order::class, function (Faker $faker) {
    // 随机取一个用户
    $user = User::query()->inRandomOrder()->first();
    // 随机取一个该用户的地址
    $address = $user->addresses()->inRandomOrder()->first();
    // 10 % 的概率把订单标记为退款
    $refund = random_int(0, 10) < 1;
    // 随机生成发货状态
    $ship = $faker->randomElement(array_keys(Order::$shipStatusMap));
    // 优惠券
    $coupon = null;
    // 30 % 概率该订单使用了优惠券
    if (random_int(0, 10) < 3) {
        // 为了避免出现逻辑错误，只选择没有最低金额限制和的优惠券
        $coupon = CouponCode::query()->where('min_amount', 0)->inRandomOrder()->first();
        // 增加优惠券的使用量
        $coupon->changeUsed();
    }

    return [
        'address' => [
            'address' => $address->full_address,
            'zip' => $address->zip,
            'contact_name' => $address->contact_name,
            'contact_phone' => $address->contact_phone,
        ],
        'total_amount' => 0,
        'remark' => $faker->sentence,
        // 30 天前到现在任意时间点
        'paid_at' => $faker->dateTimeBetween('-30 days'),
        'payment_method' => $faker->randomElement(['wechat', 'alipay']),
        'payment_no' => $faker->uuid,
        'refund_status' => $refund ? Order::REFUND_STATUS_SUCCESS : Order::REFUND_STATUS_PENDING,
        'refund_no' => $refund ? Order::getAvailableRefundNo() : null,
        'closed' => false,
        'reviewed' => random_int(0, 10) > 2,
        'ship_status' => $ship,
        'ship_data' => Order::SHIP_STATUS_PENDING === $ship ? null : [
            'express_company' => $faker->company,
            'express_no' => $faker->uuid,
        ],
        'extra' => $refund ? ['refund_reason' => $faker->sentence] : [],
        'user_id' => $user->id,
        'coupon_code_id' => $coupon ? $coupon->id : null,
    ];
});

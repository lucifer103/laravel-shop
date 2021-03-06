<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增长 ID');
            $table->string('name')->comment('标题');
            $table->string('code')->unique()->comment('优惠码，用户下单时输入');
            $table->string('type')->comment('类型，支持固定金额和百分比折扣');
            $table->decimal('value')->comment('折扣值，根据不同类型含义不同');
            $table->unsignedInteger('total')->comment('全站可兑换的数量');
            $table->unsignedInteger('used')->default(0)->comment('全站已兑换的数量');
            $table->decimal('min_amount', 10, 2)->comment('使用该优惠券的最低订单金额');
            $table->datetime('not_before')->nullable()->comment('在这个时间之前不可用');
            $table->dateTime('not_after')->nullable()->comment('在这个时间之后不可用');
            $table->boolean('enabled')->comment('优惠券是否生效');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('coupon_codes');
    }
}

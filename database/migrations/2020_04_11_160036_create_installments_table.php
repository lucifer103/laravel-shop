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

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增长 ID');
            $table->string('no')->unique()->comment('分期流水号');
            $table->unsignedBigInteger('user_id')->comment('用户 ID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('order_id')->comment('对应的商品订单 ID');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->decimal('total_amount')->comment('总本金');
            $table->unsignedBigInteger('count')->comment('还款期数');
            $table->float('fee_rate')->comment('手续费率');
            $table->float('fine_rate')->comment('逾期费率');
            $table->string('status')->default(\App\Models\Installment::STATUS_PENDING)->comment('还款状态');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
}

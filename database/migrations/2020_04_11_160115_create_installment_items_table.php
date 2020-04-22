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

class CreateInstallmentItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('installment_items', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增长 ID');
            $table->unsignedBigInteger('installment_id')->comment('分期 ID');
            $table->foreign('installment_id')->references('id')->on('installments')->onDelete('cascade');
            $table->unsignedBigInteger('sequence')->comment('还款顺序编号');
            $table->decimal('base')->comment('当前本金');
            $table->decimal('fee')->comment('当前手续费');
            $table->decimal('fine')->nullable()->comment('当前逾期费');
            $table->dateTime('due_date')->comment('还款截止日期');
            $table->dateTime('paid_at')->nullable()->comment('还款日期');
            $table->string('payment_method')->nullable()->comment('还款支付平台');
            $table->string('payment_no')->nullable()->comment('还款支付平台订单号');
            $table->string('refund_status')->default(\App\Models\InstallmentItem::REFUND_STATUS_PENDING)->comment('退款状态');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('installment_items');
    }
}

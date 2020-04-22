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

class CreateCrowdfundingProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('crowdfunding_products', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增长 ID');
            $table->unsignedBigInteger('product_id')->comment('对应商品表的 ID');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->decimal('target_amount', 10, 2)->comment('众筹目标金额');
            $table->decimal('total_amount', 10, 2)->default(0)->comment('当前已筹金额');
            $table->unsignedInteger('user_count')->default(0)->comment('当前参与众筹用户数');
            $table->dateTime('end_at')->comment('众筹结束时间');
            $table->string('status')->default(\App\Models\CrowdfundingProduct::STATUS_FUNDING)->comment('当前筹款的状态');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('crowdfunding_products');
    }
}

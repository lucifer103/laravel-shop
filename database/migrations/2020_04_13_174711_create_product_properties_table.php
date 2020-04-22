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

class CreateProductPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('自增长 ID');
            $table->unsignedBigInteger('product_id')->comment('商品 ID');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('name')->comment('属性名称');
            $table->string('value')->comment('属性值');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('product_properties');
    }
}

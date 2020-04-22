<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\CrowdfundingProduct;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class CrowdfundingProductsController extends CommonProductsController
{
    public function getProductType()
    {
        // TODO: Implement getProductType() method.
        return Product::TYPE_CROWDFUNDING;
    }

    protected function customGrid(Grid $grid)
    {
        // TODO: Implement customGrid() method.
        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '商品名称');
        $grid->column('on_sale', '已上架')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('price', '价格');
        $grid->column('crowdfunding.target_amount', '目标金额');
        $grid->column('crowdfunding.end_at', '结束时间');
        $grid->column('crowdfunding.total_amount', '目前金额');
        $grid->column('crowdfunding.status', '状态')->display(function ($value) {
            return CrowdfundingProduct::$statusMap[$value];
        });
    }

    protected function customForm(Form $form)
    {
        // TODO: Implement customForm() method.
        // 众筹相关字段
        $form->text('crowdfunding.target_amount', '众筹目标金额')->rules('required|numeric|min:0.01');
        $form->datetime('crowdfunding.end_at', '众筹结束时间')->rules('required|date');
    }
}

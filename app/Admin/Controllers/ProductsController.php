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
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ProductsController extends CommonProductsController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    public function getProductType()
    {
        // TODO: Implement getProductType() method.
        return Product::TYPE_NORMAL;
    }

    public function customGrid(Grid $grid)
    {
        // TODO: Implement customGrid() method.
        $grid->model()->with(['category']);
        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '商品名称');
        $grid->column('category.name', '类目');
        $grid->column('on_sale', '已上架')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('price', '价格');
        $grid->column('rating', '评分');
        $grid->column('sold_count', '销量');
        $grid->column('review_count', '评论数');
    }

    protected function customForm(Form $form)
    {
        // TODO: Implement customForm() method.
        // 普通商品没有额外的字段，因此这里不需要写任何代码
    }
}

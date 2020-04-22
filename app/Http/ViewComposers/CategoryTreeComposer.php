<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\ViewComposers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryTreeComposer
{
    protected $categoryService;

    // 使用 Laravel 的依赖注入，自动注入所需要的 CategoryService 类
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // 当渲染指定的模板时，Laravel 会调用 compose 方法
    public function compose(View $view)
    {
        // 使用 with 方法注入变量
        $view->with('categoryTree', $this->categoryService->getCategoryTree());
    }
}

<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // 使用 Gate::guessPolicyNamesUsing 方法来自定义策略文件的寻找逻辑
        Gate::guessPolicyNamesUsing(function ($class) {
            // class_basename 是 Laravel 提供的一个辅助函数，可以获取类的简短名称
            // 例如传入 \App\Models\User 会返回 User
            return '\\App\\Policies\\'.class_basename($class).'Policy';
        });
    }
}

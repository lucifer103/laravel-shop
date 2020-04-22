<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

if (!function_exists('route_class')) {
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if (!function_exists('ngrok_url')) {
    function ngrok_url($routeName, $parameters = [])
    {
        // 开发环境，并且配置了 NGROK_URL
        if (app()->environment('local') && $url = config('app.ngrok_url')) {
            // route() 函数第三个参数代表是否绝对路径
            return $url.route($routeName, $parameters, false);
        }

        return route($routeName, $parameters);
    }
}

if (!function_exists('big_number')) {
    function big_number($number, $scale = 2)
    {
        return new \Moontoast\Math\BigNumber($number, $scale);
    }
}

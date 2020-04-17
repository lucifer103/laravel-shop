<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\InvalidRequestException;

class RandomDropSeckillRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // $parcent 参数是在路由添加中间件时传入
    public function handle($request, Closure $next, $parcent)
    {
        if (random_int(0, 100) < (int) $parcent) {
            throw new InvalidRequestException('参与的用户过多，请稍后再试', 403);
        }
        
        return $next($request);
    }
}

<?php

/*
 * This file is part of the lucifer103/larave-shop.
 *
 * (c) Lucifer<luciferi103@outlook.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SeckillProduct extends Model
{
    protected $fillable = ['start_at', 'end_at'];

    protected $dates = ['start_at', 'end_at'];

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 定义一个名为 is_before_start 的访问器，当时时间早于秒杀开始时间时返回 true
    public function getIsBeforeStartAttribute()
    {
        return Carbon::now()->lt($this->start_at);
    }

    // 定义一个名为 is_after_end 的访问器，当前时间晚于秒杀结束时间时返回 true
    public function getIsAfterEndAttribute()
    {
        return Carbon::now()->gt($this->end_at);
    }
}

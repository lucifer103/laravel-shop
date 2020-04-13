<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $fillable = ['name', 'value'];

    // 有 created_at 和 updated_at 字段
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id', 'name', 'status',
    ];

    public function Cate()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}

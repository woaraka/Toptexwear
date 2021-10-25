<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'sub_category_id', 'code', 'name', 'fetcher', 'latest', 'stock', 'asking', 'selling',
        'size', 'color', 'description', 'photo1', 'photo2', 'photo3', 'status',
    ];

    public function Cate()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subCate()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}

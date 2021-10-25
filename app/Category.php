<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'photo', 'order', 'status',
    ];

    public function sub_category()
    {
        return $this->hasMany(SubCategory::class);
    }
}

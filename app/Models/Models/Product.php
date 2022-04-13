<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'url', 'description', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

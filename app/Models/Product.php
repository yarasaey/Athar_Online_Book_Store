<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authors;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;
    public function category()
{
    return $this->belongsTo(Category::class);
}

   public function author()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }
    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}

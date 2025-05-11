<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Authors extends Model
{
    use HasFactory;
    
    protected $table = 'authors'; 
    public function products()
    {
        return $this->hasMany(Product::class, 'author_id'); 
    }
    protected $fillable = ['name', 'bio'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
    protected $table= 'discount_copouns';
    protected $fillable =[
        'code',
        'name',
        'description',
        'maxs_uses',
        'maxs_uses_users',
        'type',
        'min_amount',
        'status',
        'starts_at',
        'expires_at',
    ];
}

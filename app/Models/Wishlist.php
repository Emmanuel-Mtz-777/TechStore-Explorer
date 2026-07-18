<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_image',
        'product_price',
        'category_id',
        'category_name'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Wishlist;

class ProductController extends Controller
{
    public function getProductById($id){
        
        $product = Http::get("https://api.escuelajs.co/api/v1/products/{$id}")->json();
        $isFavorite = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product['id'])
            ->exists();

        return view('products.show', compact('product', 'isFavorite'));
    }
}

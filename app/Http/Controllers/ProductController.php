<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function getProductById($id){
        
        $product = Http::get("https://api.escuelajs.co/api/v1/products/{$id}")->json();
        return view('products.show', compact('product'));
    }
}

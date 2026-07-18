<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Mail;
use App\Mail\WishlistAddedMail;
use App\Mail\WishlistDeletedMail;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->get();

        return response()->json([
            'wishlist' => $wishlist
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required']
        ]);


        $product = Http::get(
            "https://api.escuelajs.co/api/v1/products/{$request->product_id}"
        )->json();


        $wishlist = Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $product['id'],
            'product_name' => $product['title'],
            'product_image' => $product['images'][0] ?? null,
            'product_price' => $product['price'],
            'category_id' => $product['category']['id'] ?? null,
            'category_name' => $product['category']['name'] ?? null,
        ]);


        Mail::to(auth()->user()->email)
            ->send(new WishlistAddedMail($product));


        return response()->json([
            'message' => 'Producto agregado a wishlist',
            'wishlist' => $wishlist
        ], 201);
    }



    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => ['required']
        ]);


        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();


        Mail::to(auth()->user()->email)
            ->send(new WishlistDeletedMail());


        return response()->json([
            'message' => 'Producto eliminado de wishlist'
        ]);
    }
}
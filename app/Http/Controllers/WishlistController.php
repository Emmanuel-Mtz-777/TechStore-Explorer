<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Wishlist;

class WishlistController extends Controller
{

    public function index()
    {
        return view('wishlist.wishlist');
    }

    public function addWishlist(Request $request)
    {
        $product = Http::get("https://api.escuelajs.co/api/v1/products/{$request->product_id}")->json();

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $product['id'],
            'product_name' => $product['title'],
            'product_image' => $product['images'][0] ?? null,
            'product_price' => $product['price'],
            'category_id' => $product['category']['id'] ?? null,
            'category_name' => $product['category']['name'] ?? null,
        ]);

        return back()->with('success', 'Product added to wishlist successfully.');
    }

    public function removeWishlist(Request $request)
    {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();

        return back()->with('success', 'Product removed from wishlist successfully.');
    }
}

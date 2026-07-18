<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Wishlist;
use App\Mail\WishlistAddedMail;
use App\Mail\WishlistDeletedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{

    public function index()
    {
        return view('wishlist.wishlist');
    }

    public function addWishlist(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
        ]);

        $response = Http::get(
            "https://api.escuelajs.co/api/v1/products/{$request->product_id}"
        );

        if (! $response->successful()) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $product = $response->json();

        Wishlist::create([
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

        return back()->with('success', 'El producto se añadio correctamente. Revisa tu confirmacion por correo');
    }

    public function removeWishlist(Request $request)
    {
        $request->validate(['product_id' => ['required', 'integer'],]);

        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();

        try {
            Mail::to(auth()->user()->email)
                ->send(new WishlistDeletedMail());
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }

        return back()->with(
            'success',
            'El producto se eliminó correctamente.'
        );
            }
}

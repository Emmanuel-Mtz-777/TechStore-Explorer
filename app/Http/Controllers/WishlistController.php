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

        try {
            $response = Http::timeout(8)
                ->retry(2, 200)
                ->get("https://api.escuelajs.co/api/v1/products/{$request->product_id}");

            if ($response->notFound()) {
                return back()->with('error', 'Producto no encontrado.');
            }

            if ($response->failed()) {
                return back()->with('error', 'Error al consultar la API.');
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

            try {
                Mail::to(auth()->user()->email)
                    ->queue(new WishlistAddedMail($product));
            } catch (\Throwable $e) {
                Log::error('Error enviando correo de wishlist: ' . $e->getMessage());
            }

            return back()->with(
                'success',
                'El producto se añadió correctamente. Revisa tu correo de confirmación.'
            );

        } catch (\Throwable $e) {
            Log::error('Error al consultar la API: ' . $e->getMessage());

            return back()->with(
                'error',
                'No fue posible conectar con el servicio de productos. Intenta nuevamente.'
            );
        }
    }

    public function removeWishlist(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
        ]);

        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();

        try {
            Mail::to(auth()->user()->email)
                ->queue(new WishlistDeletedMail());
        } catch (\Throwable $e) {
            Log::error('Error enviando correo de eliminación: ' . $e->getMessage());
        }

        return back()->with(
            'success',
            'El producto se eliminó correctamente.'
        );
    }
}

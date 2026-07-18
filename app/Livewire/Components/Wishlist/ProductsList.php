<?php

namespace App\Livewire\Components\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;
use App\Mail\WishlistDeletedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ProductsList extends Component
{
    public function remove($productId)
    {
        Wishlist::where('user_id', auth()->id())
        ->where('product_id', $productId)->delete();

        try{
            Mail::to(auth()->user()->email)
                ->queue(new WishlistDeletedMail());
        } catch (\Throwable $e) {
            Log::error('Error enviando correo de wishlist: ' . $e->getMessage());
        }
        $this->dispatch('wishlist-removed', message: 'El producto se eliminó correctamente.');
    }

    public function render()
    {
        return view('livewire.components.wishlist.products-list',[
            'wishlistItems' => Wishlist::where('user_id', auth()->id())->get(),
        ]);
    }
}

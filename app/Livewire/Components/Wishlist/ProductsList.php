<?php

namespace App\Livewire\Components\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class ProductsList extends Component
{
    public function remove($productId)
    {
        Wishlist::where('user_id', auth()->id())
        ->where('product_id', $productId)->delete();
    }

    public function render()
    {



        return view('livewire.components.wishlist.products-list',[
            'wishlistItems' => Wishlist::where('user_id', auth()->id())->get(),
        ]);
    }
}

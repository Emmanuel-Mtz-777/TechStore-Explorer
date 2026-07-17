<?php

namespace App\Livewire\Components\Products;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductsList extends Component
{
    public array $products = [];

    public string $category = '';

    public int $offset = 0;

    public int $limit = 15;

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        if ($this->category) {

            $this->products = Http::get(
                "https://api.escuelajs.co/api/v1/categories/{$this->category}/products",[
                'offset' => $this->offset,
                'limit' => $this->limit,
            ]
            )->json();

            return;
        }

        $this->products = Http::get(
            "https://api.escuelajs.co/api/v1/products",
            [
                'offset' => $this->offset,
                'limit' => $this->limit,
            ]
        )->json();
    }

    #[On('paginationChanged')]
    public function paginationChanged(int $offset, int $limit)
    {
        $this->offset = $offset;
        $this->limit = $limit;

        $this->loadProducts();
    }

    #[On('categorySelected')]
    public function categorySelected(string $category)
    {
        $this->category = $category;
        $this->offset = 0;

        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.components.products.products-list');
    }
}
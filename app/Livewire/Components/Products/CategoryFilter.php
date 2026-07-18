<?php

namespace App\Livewire\Components\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class CategoryFilter extends Component
{
    public array $categories = [];
    public string $selectedCategory = '';

    public function mount()
    {
        $this->categories = Http::get('https://api.escuelajs.co/api/v1/categories')->json();
        
    }

    public function updatedSelectedCategory()
    {
        $this->dispatch(
    'categorySelected',
    category: $this->selectedCategory
);
    }

    public function render()
    {
        return view('livewire.components.products.category-filter');
    }
}

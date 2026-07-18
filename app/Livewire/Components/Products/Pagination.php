<?php

namespace App\Livewire\Components\Products;

use Livewire\Component;

class Pagination extends Component
{
    public int $offset = 0;
    public int $limit = 15;

    public function next()
    {
        $this->offset += $this->limit;
        $this->dispatch('paginationChanged', $this->offset, $this->limit);
    }

    public function previous()
    {
        $this->offset -= $this->limit;
        if ($this->offset < 0) {
            $this->offset = 0;
        }
        $this->dispatch('paginationChanged', $this->offset, $this->limit);
    }


    public function render()
    {
        return view('livewire.components.products.pagination');
    }
}

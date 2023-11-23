<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSelect extends Component
{
    public $orderProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->allProducts = Product::all();
        $this->orderProducts = [];
    }

    public function addProduct()
    {
        $this->orderProducts[] = [];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function render()
    {
        info($this->orderProducts);
        return view('livewire.product-select');
    }
}

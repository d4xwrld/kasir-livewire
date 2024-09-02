<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        return view('livewire.product')->with('products', \App\Models\Product::all());
    }
}
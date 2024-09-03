<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModels;

class Product extends Component
{
    public $status = 'index';
    public $name;
    public $price;
    public $stock;
    public $selected;
    public $showModal = false;
    public function preEdit($id)
    {
        $this->selected = ProductModels::findOrFail($id);
        $this->name = $this->selected->name;
        $this->price = $this->selected->price;
        $this->stock = $this->selected->stock;
        
        $this->status = 'edit';
    }

    public function preDelete($id)
    {
        $this->selected = ProductModels::findOrFail($id);
        $this->showModal = true; // Show the confirmation modal
    }

    public function delete()
    {
        if ($this->selected) {
            $this->selected->delete();
            session()->flash('message', 'Data deleted successfully.');
        }

        $this->showModal = false;
        $this->status = 'index';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ], [
            'name.required' => 'name harus diisi',
            'price.required' => 'harga harus diisi',
            'stock.required' => 'stock harus diisi'
        ]);

        $store = new ProductModels;

        $store->fill([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
        ]);
        $store->save();

        $this->reset(['name', 'price', 'stock']);
        $this->status = 'index';
    }

    public function Status($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        return view('livewire.product')->with('products', ProductModels::all());
    }
}
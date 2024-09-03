<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member as MemberModels;

class Member extends Component
{
    public $status = 'index';
    public $name;
    public $phone;
    public $selected;
    public $showModal = false;

    public function preEdit($id)
    {
        $this->selected = MemberModels::findOrFail($id);
        $this->name = $this->selected->name;
        $this->phone = $this->selected->phone;
        $this->status = 'edit';
    }

    public function preDelete($id)
    {
        $this->selected = MemberModels::findOrFail($id);
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
            'phone' => 'required|unique:members,phone',
        ], [
            'name.required' => 'name harus diisi',
            'phone.required' => 'nomor telepon harus diisi',
            'phone.unique' => 'nomor telepon sudah terdaftar',
        ]);

        $store = new MemberModels;

        $store->fill([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);
        $store->save();

        $this->reset(['name', 'phone']);
        $this->status = 'index';
    }

    public function Status($newStatus)
    {
        $this->status = $newStatus;
    }
    
    public function render()
    {
        return view('livewire.member')->with([
            'members' => MemberModels::all()
        ]);
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
    public $status = 'index';
    public function Status($newStatus)
    {
        $this->status = $newStatus;
    }
    
    public function render()
    {
        return view('livewire.user')->with('users', \App\Models\User::all());
        
    }
}
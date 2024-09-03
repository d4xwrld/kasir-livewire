<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as UserModels;

class User extends Component
{
    public $status = 'index';
    public $username;
    public $email;
    public $role;
    public $password;
    public $selected;
    public $showModal = false;

    public function preEdit($id)
    {
        $this->selected = UserModels::findOrFail($id);
        $this->username = $this->selected->name;
        $this->email = $this->selected->email;
        $this->role = $this->selected->role;
        $this->status = 'edit';
    }

    public function preDelete($id)
    {
        $this->selected = UserModels::findOrFail($id);
        $this->showModal = true; // Show the confirmation modal
    }

    public function delete()
    {
        if ($this->selected) {
            $this->selected->delete();
            session()->flash('message', 'User deleted successfully.');
        }

        $this->showModal = false;
        $this->status = 'index';
    }

    public function store()
    {
        $this->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'username harus diisi',
            'email.required' => 'email harus diisi',
            'email.email' => 'email harus valid',
            'email.unique' => 'email sudah terdaftar',
            'role.required' => 'role harus diisi',
            'password.required' => 'password harus diisi'
        ]);

        $store = new UserModels;

        $store->fill([
            'name' => $this->username,
            'email' => $this->email,
            'role' => $this->role,
            'password' => bcrypt($this->password)
        ]);
        $store->save();

        $this->reset(['username', 'email', 'role', 'password']);
        $this->status = 'index';
    }

    public function Status($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        return view('livewire.user')->with('users', UserModels::all());
    }
}
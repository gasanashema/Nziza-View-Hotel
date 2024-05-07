<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserComponent extends Component
{
    public $users;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $role;
    public $password;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.user.user', ['users' => $this->users])->layout('livewire.layout.base');
    }

    public function save()
    {
        // Validation
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'role' => 'required', // Assuming roles are 'admin' and 'user'
            'password' => 'required|string|min:6',
        ]);

        // Data preparation
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->role,
            'password' => Hash::make($this->password), // Hash password before storing
        ];

        // Create user
        User::create($data);

        // Fetch updated user list and assign it to $users
        $this->users = User::all();

        // Reset input fields after successful operation
        $this->resetInputFields();

        // Flash a success message
        session()->flash('message', 'User successfully added.');
    }

    private function resetInputFields()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->phone = null;
        $this->role = null;
        $this->password = null;
    }
}


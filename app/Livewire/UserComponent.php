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
    public $user_id;
    public $NewPassword;
    public $new_role;

    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

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

    public function edit($id)
    {
        $editRow = User::find($id);


        $this->first_name = $editRow->first_name;
        $this->last_name = $editRow->last_name;
        $this->email = $editRow->email;
        $this->phone = $editRow->phone;
        $this->role = $editRow->type;
        $this->user_id = $editRow->id;

        $this->openModal();
    }

    public function update($id)
    {
        // Validate input data, exclude current user id from unique email check
        $data = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:255',
            'new_role' => 'required',
            'NewPassword' => 'nullable|string|min:6',
        ]);

        // Retrieve the user
        $user = User::findOrFail($id);

        // Update the user with the validated data
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        if ($data['new_role'] == 'user') {
            $user->type = 0;
        } elseif ($data['new_role'] == 'admin') {
            $user->type = 1;
        }

        // Only update the password if a new one was provided
        if (!empty($this->NewPassword)) {
            $user->password = Hash::make($this->NewPassword);
        }

        // Save the changes
        if ($user->isDirty()) {
            if ($user->save()) {
                // If the save returns true, display success message
                session()->flash('message', 'User successfully updated.');
            } else {
                // If the save operation failed, display an error message
                session()->flash('error', 'Failed to update the user.');
            }
        } else {
            // If no attributes were changed, also provide feedback
            session()->flash('info', 'No changes were made to the user.');
        }

        // Fetch updated user list and assign it to $users
        $this->users = User::all();

        // Close the modal after updating the record
        $this->closeModal();
    }



}


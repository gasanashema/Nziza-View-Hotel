<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;
use App\Models\User;


class UserProfileCompnent extends Component
{
    public $logged_user;
    public $total_reservations;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function mount(){
        $this->logged_user = auth()->user();
        $this->total_reservations = Reservation::where('user_id', $this->logged_user->id)->count(); 

    }
    public function render()
    {
        return view('livewire.user.user-profile')->layout('livewire.layout.base');
    }
    public function edit($id)
    {
        $editRow = User::find($id);


        $this->first_name = $editRow->first_name;
        $this->last_name = $editRow->last_name;
        $this->email = $editRow->email;
        $this->phone = $editRow->phone;



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
        
        ]);

        // Retrieve the user
        $user = User::findOrFail($id);

        // Update the user with the validated data
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
      

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



        // Close the modal after updating the record
        $this->closeModal();
    }
}

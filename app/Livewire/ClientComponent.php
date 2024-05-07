<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientComponent extends Component
{

  
    public $clients;

    public $names;
    public $client_id;
    public $gender;
    public $phone;
    public $nationality;
    public $id_number;
    public $passport_number;

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
        // Fetch all clients from the database
        $this->clients = Client::all();
    }


    public function render()
    {
        return view('livewire.client.client', ['clients' => $this->clients])->layout('livewire.layout.base');
    }

     // Save function to update the category details
    public function save()
    {
      
         $validated = $this->validate([
            'names' => 'required|max:255',
            'gender' => 'required|max:255',
            'phone' => 'required|max:30',
            'nationality' => 'required|max:255',
            'id_number' => 'max:255',
            'passport_number' => 'max:200',
        ]);


      

        Client::create($validated);

        // Fetch updated room list and assign it to $rooms
        $this->clients = Client::all();

        $this->reset(['names', 'gender', 'phone','nationality','id_number','passport_number']);

        // Flash a success message
        session()->flash('message', 'Client  successfully added.');
    }

    public function edit($id)
    {
        $editRow = Client::find($id);
        $this->names = $editRow->names;
        $this->gender = $editRow->gender;
        $this->phone = $editRow->phone;
        $this->nationality = $editRow->nationality;
        $this->id_number = $editRow->id_number;
        $this->passport_number = $editRow->passport_number;
        $this->client_id = $editRow->id;

        $this->openModal();
    }

    public function update($id)
    {
        // Validate input data
        $data = $this->validate([
            'names' => 'required|max:255',
            'gender' => 'required|max:255',
            'phone' => 'required|max:30',
            'nationality' => 'required|max:255',
            'id_number' => 'max:255',
            'passport_number' => 'max:200',
        ]);

        // Update the room record with the provided $id
        Client::findOrFail($id)->update($data);

        // Fetch updated room list and assign it to $rooms
        $this->clients = Client::all();

        // Close the modal after updating the record
        $this->closeModal();
    }
    
}

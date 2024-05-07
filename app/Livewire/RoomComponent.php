<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\RoomCategory;
class RoomComponent extends Component
{

  
    public $categories;
    public $rooms;

    public $title;
    public $details;
    public $room_category_id;
    public $room_id;

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
        // Fetch all categories from the database
        $this->categories = RoomCategory::all();
        // Fetch all rooms from the database
        $this->rooms = Room::all();
    }


    public function render()
    {
        return view('livewire.room.room', ['rooms' => $this->rooms,'categories'=>$this->categories])->layout('livewire.layout.base');
    }

      // Save function to update the category details
    public function save()
    {
        $data = [
        'title' => $this->title,
        'details' => $this->details,
        'room_category_id' => $this->room_category_id,
        ];

      

        Room::create($data);

        // Fetch updated room list and assign it to $rooms
        $this->rooms = Room::all();

        $this->reset(['title']);

        // Flash a success message
        session()->flash('message', 'Room  successfully added.');
    }
    public function edit($id)
    {
        $editRow = Room::find($id);
        $this->title = $editRow->title;
        $this->details = $editRow->details;
        $this->room_category_id = $editRow->room_category_id;
        $this->room_id = $editRow->id;

        $this->openModal();
    }

    public function update($id)
    {
        // Validate input data
        $data = $this->validate([
            'title' => 'required',
            'details' => 'required',
            'room_category_id' => 'required|exists:room_categories,id',
        ]);

        // Update the room record with the provided $id
        Room::findOrFail($id)->update($data);

        // Fetch updated room list and assign it to $rooms
        $this->rooms = Room::all();

        // Close the modal after updating the record
        $this->closeModal();
    }

}

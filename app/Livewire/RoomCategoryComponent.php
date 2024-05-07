<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoomCategory;

class RoomCategoryComponent extends Component
{
    public $categories;

    // Public properties for editing
    public $category_id;
    public $category_title;
    public $detail;
    public $price_per_night;

    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }


    // Mount function to fetch categories
    public function mount()
    {
        // Fetch all categories from the database
        $this->categories = RoomCategory::all();
    }

 

    // Save function to update the category details
    public function save()
    {
        $validated = $this->validate([
            'category_title' => 'required|max:255',
            'detail' => 'required|max:255',
            'price_per_night' => 'required|numeric',
        ]);

        RoomCategory::create($validated);

       $this->categories = RoomCategory::all();

        $this->reset(['category_title']);

        // Flash a success message
        session()->flash('message', 'Room Category successfully added.');
    }

    public function render()
    {
        return view('livewire.room-category.room-category',['categories' => $this->categories])->layout('livewire.layout.base');
    }

    public function edit($id)
    {
        $editRow = RoomCategory::find($id);
        $this->category_title = $editRow->category_title;
        $this->detail = $editRow->detail;
        $this->price_per_night = $editRow->price_per_night;
        $this->category_id = $editRow->id;
       

        $this->openModal();
    }

    public function update($id)
    {
        // Validate input data
        $data = $this->validate([
            'category_title' => 'required',
            'detail' => 'required',
            'price_per_night' => 'required'
        ]);

        // Update the room record with the provided $id
        RoomCategory::findOrFail($id)->update($data);

        // Fetch updated room list and assign it to $rooms
        $this->categories = RoomCategory::all();

        // Close the modal after updating the record
        $this->closeModal();
    }

}


<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class NewreservationComponent extends Component
{

    public $categories;
    public $rooms;
    public $clients;
    public $reservations;
    public $client;

    public $CheckInDate = null;
    public $CheckOutDate;
    public $selectedRoom;
    public $price;
    public $reservationStatus;
    public $payment_status;

    public function mount()
    {
        $this->categories = RoomCategory::all();
        $this->rooms = collect();
        $this->clients = Client::all();
        $this->reservations = Reservation::all();
        $this->price = 0;
    }

    public function render()
    {
        return view('livewire.reservation.newreservation')->layout('livewire.layout.base');
    }

    public function updatedCheckInDate()
    {
        $this->updatePrice();
    }
    public function updatedCheckOutDate()
    {
        $this->updateAvailableRooms();
        $this->updatePrice();
    }
    private function updateAvailableRooms()
    {
        if ($this->CheckInDate && $this->CheckOutDate) {
            $reservedRoomIds = Reservation::where(function ($query) {
                $query->where('check_in_date', '<', $this->CheckOutDate)
                    ->where('check_out_date', '>', $this->CheckInDate);
            })->pluck('room_id');

            $this->rooms = Room::whereNotIn('id', $reservedRoomIds)->get();
        }
    }
    public function updatedSelectedRoom()
    {
        $this->updatePrice();
    }
    public function updatePrice()
    {
        if ($this->CheckInDate && $this->CheckOutDate && $this->selectedRoom) {
            $checkIn = Carbon::parse($this->CheckInDate);
            $checkOut = Carbon::parse($this->CheckOutDate);
            $numberOfDays = $checkOut->diffInDays($checkIn);

            $room = Room::with('roomCategory')->find($this->selectedRoom);
            if ($room && $room->roomCategory) {
                if ($numberOfDays==0) {
                    $this->price = $room->roomCategory->price_per_night;
                }else{
                $this->price = $numberOfDays * $room->roomCategory->price_per_night;
                }
            }
        }
    }
    public function save()
    {
        // Validate input values
        $this->validate([
            'CheckInDate' => 'required|date',
            'CheckOutDate' => 'required|date|after_or_equal:CheckInDate',
            'selectedRoom' => 'required|exists:rooms,id',
            'client' => 'required|exists:clients,id',
            'payment_status' => 'required',
        ]);

        try {
            $this->reservationStatus = check_reservation_status($this->CheckInDate, $this->CheckOutDate);
            if ($this->reservationStatus == 'Ended') {
                session()->flash('error', "Can't Create reservation for passed dates");
                return;  
            }
            // Create a new reservation
            $reservation = new Reservation();
            $reservation->room_id = $this->selectedRoom;
            $reservation->client_id = $this->client;
            $reservation->check_in_date = Carbon::parse($this->CheckInDate);
            $reservation->check_out_date = Carbon::parse($this->CheckOutDate);
            $reservation->price = $this->price; // Ensure that this is calculated correctly before saving
            $reservation->status = $this->reservationStatus;
            $reservation->payment_status = $this->payment_status;
            $reservation->user_id = Auth::id();


            $reservation->save();

            // Clear form data after saving
            $this->resetInput();

            // Provide feedback to user
            session()->flash('message', 'Reservation successfully created.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create reservation: ' . $e->getMessage());
        }
    }

    /**
     * Resets the input fields to initial state.
     */
    private function resetInput()
    {
        $this->selectedRoom = null;
        $this->client = null;
        $this->payment_status = null;
        $this->price = 0;
        $this->rooms = collect();
    }

    // public function edit($id)
    // {
    //     $editRow = Reservation::find($id);
    //     $this->selectedRoom = $editRow->room_id;
    //     $this->client = $editRow->client_id;
    //     $this->CheckInDate = Carbon::parse($editRow->check_in_date);
    //     $this->CheckOutDate = Carbon::parse($editRow->check_out_date);
    //     $this->price = $editRow->price; 
    //     $this->reservationStatus = $editRow->status;
    //     $this->payment_status = $editRow->payment_status;

    // }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ReservationComponent extends Component
{
    public $currentDate;
    public $categories;
    public $rooms;
    public $clients;
    public $reservations;
    public $reservationOngoing;
    public $reservationCompleted;
    public $reservationPending;

    public $check_in_date;
    public $check_out_date;
    public $client_id;
    public $room_id;
    public $status;

    public $client;
    public $CheckInDate = null;
    public $CheckOutDate;
    public $selectedRoom;
    public $price;
    public $reservationStatus;
    public $payment_status;

    public $isReservationOpen = false;
    public $isEditReservationOpen = false;

    public function openReservationModal()
    {
        $this->isReservationOpen = true;
    }

    public function closeReservationModal()
    {
        $this->isReservationOpen = false;
    }

    public function openEditReservationModal()
    {
        $this->isEditReservationOpen = true;
    }

    public function closeEditReservationModal()
    {
        $this->isEditReservationOpen = false;
    }

    public function mount()
    {
        $this->currentDate = Carbon::now();
        $this->categories = RoomCategory::all();
        $this->rooms = collect();  // Initially empty
        $this->clients = Client::all();
        $this->reservations = Reservation::orderBy('created_at', 'desc')->get();
        $this->reservationOngoing = Reservation::whereDate('check_in_date', '<=', $this->currentDate)
        ->whereDate('check_out_date', '>=', $this->currentDate)->orderBy('created_at', 'desc')
        ->get();
        $this->reservationCompleted = Reservation::whereDate('check_out_date', '<', $this->currentDate)->orderBy('created_at', 'desc')->get();
        $this->reservationPending = Reservation::whereDate('check_in_date', '>', $this->currentDate)->orderBy('created_at', 'desc')->get();
        $this->price = 0;
    }

    public function render()
    {
        return view('livewire.reservation.reservation', [
            'rooms' => $this->rooms,
            'categories' => $this->categories,
            'clients' => $this->clients,
            'reservations' => $this->reservations
        ])->layout('livewire.layout.base');
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
                if ($numberOfDays == 0) {
                    $this->price = $room->roomCategory->price_per_night;
                } else {
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
            
            // Create a new reservation
            $reservation = new Reservation();
            $reservation->room_id = $this->selectedRoom;
            $reservation->client_id = $this->client;
            $reservation->check_in_date = Carbon::parse($this->CheckInDate);
            $reservation->check_out_date = Carbon::parse($this->CheckOutDate);
            $reservation->price = $this->price; // Ensure that this is calculated correctly before saving
         
            $reservation->payment_status = $this->payment_status;
            $reservation->user_id = Auth::id();

            $reservation->save();
            
            $this->currentDate = Carbon::now();
            $this->reservations = Reservation::orderBy('created_at', 'desc')->get();
            $this->reservationOngoing = Reservation::whereDate('check_in_date', '<=', $this->currentDate)
            ->whereDate('check_out_date', '>=', $this->currentDate)->orderBy('created_at', 'desc')
            ->get();
            $this->reservationCompleted = Reservation::whereDate('check_out_date', '<', $this->currentDate)->orderBy('created_at', 'desc')->get();
            $this->reservationPending = Reservation::whereDate('check_in_date', '>', $this->currentDate)->orderBy('created_at', 'desc')->get();

            // Clear form data after saving
            $this->resetInput();
            $this->closeReservationModal();
            // Provide feedback to user
            session()->flash('message', 'Reservation successfully created.');
        } catch (\Exception $e) {
            $this->closeReservationModal();
            session()->flash('error', 'Failed to create reservation: ' . $e->getMessage());
        }
    }

    public function resetInput()
    {
        $this->selectedRoom = null;
        $this->client = null;
        $this->payment_status = null;
        $this->CheckInDate = null;
        $this->CheckOutDate = null;
        $this->price = 0;
        $this->rooms = collect();
    }

    // edit function
    public function edit($id)
    {
        $updateRow = Reservation::find($id);
        if (!$updateRow) {
            session()->flash('error', 'The requested reservation does not exist.');
            return;
        }

        // Load reservation details
        $this->selectedRoom = $updateRow->room_id;
        $this->client = $updateRow->client_id;
        $this->CheckInDate = Carbon::parse($updateRow->check_in_date)->toDateString();
        $this->CheckOutDate = Carbon::parse($updateRow->check_out_date)->toDateString();
        $this->price = $updateRow->price;
        $this->payment_status = $updateRow->payment_status;

        // Update rooms list to include the currently selected room, even if it would normally be excluded
        $this->updateAvailableRooms();

        // Optionally, you can add the currently selected room back to the rooms list if it's not included
        if (!in_array($this->selectedRoom, $this->rooms->pluck('id')->toArray())) {
            $selectedRoomModel = Room::find($this->selectedRoom);
            if ($selectedRoomModel) {
                $this->rooms->push($selectedRoomModel);
            }
        }

        // Open the modal to edit
        $this->openEditReservationModal();
    }

    public function update($id)
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
            $reservation = Reservation::find($id);
            if (!$reservation) {
                session()->flash('error', 'The requested reservation does not exist.');
                return;
            }

            // Check if the reservation dates are feasible
            

            // Update reservation details
            $reservation->room_id = $this->selectedRoom;
            $reservation->client_id = $this->client;
            $reservation->check_in_date = Carbon::parse($this->CheckInDate);
            $reservation->check_out_date = Carbon::parse($this->CheckOutDate);
            $reservation->price = $this->price; // Ensure the price is recalculated if necessary
            $reservation->payment_status = $this->payment_status;
            $reservation->user_id = Auth::id();

            $reservation->save();
            $this->reservations = Reservation::orderBy('created_at', 'desc')->get();
            // Clear form data after saving
            $this->resetInput();
            $this->closeEditReservationModal();

            // Provide feedback to user
            session()->flash('message', 'Reservation successfully updated.');
        } catch (\Exception $e) {
            // Handle exceptions
            $this->closeEditReservationModal();
            session()->flash('error', 'Failed to update reservation: ' . $e->getMessage());
        }
    }
}

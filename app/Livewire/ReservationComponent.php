<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Models\Client;

class ReservationComponent extends Component
{
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

    public function mount()
    {
        $this->categories = RoomCategory::all();
        $this->rooms = collect();  // Initially empty
        $this->clients = Client::all();
        $this->reservations = Reservation::orderBy('created_at', 'desc')->get();
        $this->reservationOngoing = Reservation::orderBy('created_at', 'desc')->where('status', 'Ongoing')->get();
        $this->reservationCompleted = Reservation::orderBy('created_at', 'desc')->where('status', 'Completed')->get();
        $this->reservationPending = Reservation::orderBy('created_at', 'desc')->where('status', 'Pending')->get();

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

    
}

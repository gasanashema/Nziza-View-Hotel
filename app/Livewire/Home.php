<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{


    public $categories;
    public $rooms;
    public $clients;
    public $currentDate;
    public $reservationsThisMonth;
    public $reservationsRoomsBooked;
    public $reservationsClients;
    public $reservationOngoing;
    public $reservationsRecent;

    // mount function
    public function mount()
    {

        $this->currentDate = Carbon::now();

        $this->categories = RoomCategory::all();
        $this->rooms = collect();  // Initially empty
        $this->clients = Client::all();
        // $this->reservations = Reservation::orderBy('created_at', 'desc')->get();
        $this->reservationsThisMonth = Reservation::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->count();
        $this->reservationsRoomsBooked = Reservation::where(function ($query) {
            $query->where('check_in_date', '<=', $this->currentDate)
                ->where('check_out_date', '>', $this->currentDate);
        })->orWhere(function ($query) {
            $query->where('check_in_date', '>', $this->currentDate);
        })->count();
        $this->reservationsClients = Client::count();
        $this->reservationOngoing = Reservation::whereDate('check_in_date', '<=', $this->currentDate)
        ->whereDate('check_out_date', '>=', $this->currentDate)->orderBy('created_at', 'desc')
        ->count();
        $this->reservationsRecent = Reservation::orderBy('created_at', 'desc')->limit(10)->get();
    }

    public function render()
    {
        return view('livewire.home')->layout('livewire.layout.base');
    }
}

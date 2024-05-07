<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\Reservation;
use App\Models\Client;

class ReportComponent extends Component
{
    public $categories;
    public $rooms;
    public $clients;
    public $reservations;
    public $totalPaidAmount;
    public $numberOfReservationsInThisPeriod;
    // public $numberOfPaidReservations;
    // public $numberOfNotPaidReservations;

    public $from;
    public $to;
    public $status;

    public function mount()
    {
        $this->categories = RoomCategory::all();
        $this->rooms = collect();  // Assume you populate this based on specific logic or keep it empty as placeholder
        $this->clients = Client::all();
        $this->reservations = collect(); // Initialize as empty collection
    }

    public function render()
    {
        return view('livewire.report.report', [
            'rooms' => $this->rooms,
            'categories' => $this->categories,
            'clients' => $this->clients,
            'reservations' => $this->reservations
        ])->layout('livewire.layout.base'); // Corrected layout path if necessary
    }

    public function updatedFrom()
    {
        $this->updateReport();
    }

    public function updatedTo()
    {
        $this->updateReport();
    }

    public function updateReport()
    {
        if ($this->from && $this->to) {
            $this->reservations = Reservation::whereBetween('created_at', [
                $this->from . ' 00:00:00', 
                $this->to . ' 23:59:59'  
            ])->where('payment_status', 'Paid')->get();
            $this->totalPaidAmount = $this->reservations->sum('price');
            $this->numberOfReservationsInThisPeriod = $this->reservations->count();
            // $this->numberOfPaidReservations = $this-> reservation->where('payment_status', 'Paid')->count();
            // $this->numberOfNotPaidReservations= $this->reservations->where('payment_status', 'Not Paid')->count();
        } else {
            $this->reservations = collect(); 
        }
    }
}

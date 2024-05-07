<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login; // Corrected namespace import
use App\Livewire\Home;
use App\Livewire\RoomComponent;
use App\Livewire\RoomCategoryComponent;
use App\Livewire\ClientComponent;
use App\Livewire\ReservationComponent;
use App\Livewire\NewreservationComponent;
use App\Livewire\UserComponent;
use App\Livewire\ReportComponent;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Login::class);

Route::get('/login', Login::class)->name('login'); 

Route::middleware(['auth'])->group(function () {

    // Logout Route
    Route::get('/logout', function(){
        auth()->logout();
        return redirect()->route('login');
    })->name('logout'); 

    // Home Route
    Route::get('/home', Home::class)->name('home');

    
    Route::middleware(['user-access:admin'])->group(function () {

        // Rooms Route
       Route::get('/room', RoomComponent::class)->name('room');

        //Room-category Route
       Route::get('/room-category', RoomCategoryComponent::class)->name('room.category');

        // Clients Route
        Route::get('/client', ClientComponent::class)->name('client');

        // Reservations Route
        Route::get('/reservation', ReservationComponent::class)->name('reservation');
        //new reservation
        Route::get('/new-reservation', NewreservationComponent::class)->name('new.reservation');
        // edit reservation
        Route::get('/edit-reservation/{id}', [NewreservationComponent::class,'edit'])->name('edit.reservation');
        // user Route
        Route::get('/user', UserComponent::class)->name('user');

        // Reports Route
        Route::get('/reports', ReportComponent::class)->name('reports');
    });
});

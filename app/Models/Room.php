<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'room_category_id'];
    
    
    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class);
    }
    // reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}

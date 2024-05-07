<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_title', 'detail', 'price_per_night'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

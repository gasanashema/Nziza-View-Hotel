<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'first_name',
        'last_name',
        'type', // Add the 'type' attribute to the $fillable array
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', 
        'type' => UserTypeCast::class, // Use the custom cast for the 'type' attribute
    ];
    // reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
class UserTypeCast implements \Illuminate\Contracts\Database\Eloquent\CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return ["user", "admin"][$value] ?? null;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        // You can define the logic for setting the attribute here if needed
        return $value;
    }

}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDateTime = Carbon::now()->toDateTimeString(); // Get the current time in SQL datetime format

        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '000-000-0000',
                'email' => 'admin@nziza.com',
                'password' => Hash::make('admin'),
                'type' => 1, // Assuming 1 is for admin
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],
            [
                'first_name' => 'Receptionist',
                'last_name' => 'User',
                'phone' => '000-000-0001',
                'email' => 'user@nziza.com',
                'password' => Hash::make('user'),
                'type' => 0, // Assuming 0 is for regular users
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],
        ]);
    }
}

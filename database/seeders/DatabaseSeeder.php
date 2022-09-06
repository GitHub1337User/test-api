<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(9)->create();
        User::create([
            'name' => 'Test',
            'email' => 'Test@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('Test123'),
            'remember_token' => Str::random(10),
        ]);
        Status::create([
            'status'=>'confirmed'
        ]);
        Status::create([
            'status'=>'unconfirmed'
        ]);
        Booking::factory(50)->create();

    }
}

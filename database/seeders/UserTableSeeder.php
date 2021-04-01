<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super administrator',
            'email' => 'administrator@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('qwerty123'),
            'remember_token' => Str::random(10)
        ])
        ->assignRole('super administrator');
    }
}

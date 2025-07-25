<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'User Satu',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User Dua',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}

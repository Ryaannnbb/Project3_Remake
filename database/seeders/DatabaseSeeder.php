<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('password'),
                'address' => fake()->address(),
            ],
            [
                'name' => 'User',
                'email' => 'User@gmail.com',
                'password' => Hash::make('password'),
                'address' => fake()->address(),
            ],
        ]);

        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'address' => fake()->address(),
            'role' => 'admin'
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        \App\Models\Pembayaran::factory()->create([
            'metode_pembayaran' => 'Dana',
            'no_rekening' => '12345678'
        ]);
        \App\Models\Pembayaran::factory()->create([
            'metode_pembayaran' => 'Gopay',
            'no_rekening' => '87654321'
        ]);

        \App\Models\kategori::factory(3)->create();
        \App\Models\supplier::factory(3)->create();
        \App\Models\produk::factory(3)->create();
        
    }
}

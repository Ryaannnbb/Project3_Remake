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
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'address' => Str::random(10),
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'address' => Str::random(10),
            ]
        ]);

        // \App\Models\User::create([
        //     [
        //         'name' => 'Test User',
        //         'email' => 'user@example.com',
        //         'password' => bcrypt('password'),
        //     ],
        //     [
        //         'name' => 'Test User',
        //         'email' => 'user1@example.com',
        //         'password' => bcrypt('password'),
        //     ],
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'admin'
        // ]);
        // \App\Models\kategori::factory()->create([
        //     'nama_kategori' => 'Makanan'
        // ]);
        // \App\Models\kategori::factory()->create([
        //     'nama_kategori' => 'Minuman'
        // ]);
        // \App\Models\Pembayaran::factory()->create([
        //     'metode_pembayaran' => 'Dana',
        //     'no_rekening' => '12345678'
        // ]);
        // \App\Models\Pembayaran::factory()->create([
        //     'metode_pembayaran' => 'Gopay',
        //     'no_rekening' => '87654321'
        // ]);
        // \App\Models\User::factory()

        // \App\Models\kategori::factory(3)->create();
        // \App\Models\supplier::factory(3)->create();
        // \App\Models\produk::factory(3)->create();

    }
}

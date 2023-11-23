<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => $this->faker->name(),
            'path_produk' => $this->faker->imageUrl($width = 100, $height = 100),
            'harga' => $this->faker->randomDigit(),
            'deskripsi' => $this->faker->paragraph(1),
            'kategori_id' => 1,
            'supplier_id' => 1,
        ];
    }
}

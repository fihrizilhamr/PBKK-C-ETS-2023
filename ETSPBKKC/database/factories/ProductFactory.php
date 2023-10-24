<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'Jenis' => $this->faker->randomElement(['Alat Rumah Tangga', 'Pakaian', 'Furnitur', 'Alat Elektronik']),
            'Kondisi' => $this->faker->randomElement(['Baik', 'Layak', 'Rusak']),
            'Keterangan' => $this->faker->randomElement(['Barang Baik polll', 'Meja Layak cuci']),,
            'Kecacatan' => $this->faker->randomElement(['Sudah jelek', 'Kakinya hancur', 'Hatiku hancur']),
            'Jumlah' => $this->faker->numberBetween(0, 100),
            'Image' => 'required|image|mimes:jpeg,png,jpg',
        ];
    }
}

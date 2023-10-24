<?php

namespace Database\Factories;

use App\Models\Kondisi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kondisi>
 */
class KondisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kondisi::class;
    public function definition(): array
    {
        return [
            'Kondisi' => $this->faker->randomElement(['Baik', 'Layak', 'Rusak']),
        ];
    }
}

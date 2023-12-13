<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Games>
 */
class GamesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_title'    => fake()->word,
            'date_released' => fake()->date,
            'synopsis'      => fake()->sentence,
            'image'         => fake()->imageUrl,
            'available'     => 1
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\typeFormation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formation>
 */
class formationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'duree' => fake()->numberBetween(12,24),
            'tarif' => fake()->numberBetween(1000,10000),
            'favoris' => fake()->numberBetween(0,10),
            'typeFormation_id' => 1
        ];
    }
}

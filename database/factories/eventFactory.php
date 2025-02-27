<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class eventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(3),
            'description' => fake()->text(100),
            'event_start' => fake()->date('Y-m-d'),
            'event_end' => fake()->date('Y-m-d'),
            'abonement' => fake()->numberBetween(1,10)
        ];
    }
}


    //          'titre',
    //         'description',
    //         'event_start',
    //         'event_end',
    //         'abonement',
    //         'image_path',

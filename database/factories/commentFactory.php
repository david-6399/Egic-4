<?php

namespace Database\Factories;

use App\Models\formation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Extension\CommonMark\Node\Block\ListData;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class commentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenu' => $this->faker->text(),
            'user_id' => fake()->numberBetween(1,10),
            'formation_id' => fake()->numberBetween(1,10),
        ];
    }
}

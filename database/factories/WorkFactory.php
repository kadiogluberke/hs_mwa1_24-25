<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "institution_name"=> fake()->word(),
            "role"=> fake()->word(),
            "started_at"=> fake()->dateTimeBetween('-5 year', '-2 year'),
            'finished_at'=> fake()->dateTimeBetween('-1 year','now'),
            'description'=> fake()->realText(300),
            'location'=> fake()->word(),
        ];
    }
}

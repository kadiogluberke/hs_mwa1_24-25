<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
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
            "programme"=> fake()->word(),
            "started_at"=> fake()->dateTimeBetween('-5 year', '-2 year'),
            'finished_at'=> fake()->dateTimeBetween('-1 year','now'),
            'location'=> fake()->word(),
            'description'=> fake()->realText(300),
            'grade'=> strval(fake()->randomFloat(2, 70, 100)),
        ];
    }
}

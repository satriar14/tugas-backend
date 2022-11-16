<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "nim" => fake()->unique()->numberBetween(1000000000, 9999999999),
            "jurusan" => "Teknik Informatika",
        ];
    }
}

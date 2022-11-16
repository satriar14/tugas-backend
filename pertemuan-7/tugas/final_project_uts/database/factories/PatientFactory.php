<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "address" => $this->faker->address,
            "phone" => $this->faker->phoneNumber,
            "status" => $this->faker->randomElement(['positive', 'recovered', 'dead']),
            "in_date_at" => $this->faker->date(),
            "out_date_at" => $this->faker->date(),
        ];
    }
}

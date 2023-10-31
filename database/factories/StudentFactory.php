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
    public function definition(): array
    {
        return [
            "name"=> $this->faker->name,
            "email"=> $this->faker->safeEmail,
            "address"=> $this->faker->address,
            "study_course"=> $this->faker->randomElement(['Course 1', 'Course 2', 'Course 3']),
        ];
    }
}

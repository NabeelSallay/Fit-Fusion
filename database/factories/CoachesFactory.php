<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coaches>
 */
class CoachesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'age' => $this->faker->randomNumber(),
            'certifications' => $this->faker->randomNumber(),
            'experience' => $this->faker->randomNumber(),
            'training_approach' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\clients>
 */
class ClientsFactory extends Factory
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
            'weight' => $this->faker->randomNumber(),
            'height' => $this->faker->randomNumber(),
            'activity_level' => $this->faker->randomNumber(),
            'goal' => $this->faker->randomNumber(),
            'status' => $this->faker->boolean(),
        ];
    }
}

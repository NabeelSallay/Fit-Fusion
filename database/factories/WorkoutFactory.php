<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->text,
            'goal' => $this->faker->text,
            'duration' => $this->faker->text,
            'level' => $this->faker->text,
            'status' => $this->faker->boolean,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(4, false),
            'completed' => fake()->boolean(),
        ];
    }


    public function without_long_description(): static
    {
        return $this->state(fn(array $attributes) => [
            'long_description' => null,
        ]);
    }


}

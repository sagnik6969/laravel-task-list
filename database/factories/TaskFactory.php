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
            'title' => substr(fake()->sentence(2, true), 0, -1),
            'description' => fake()->sentence(6),
            'long_description' => fake()->paragraph(8, false),
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

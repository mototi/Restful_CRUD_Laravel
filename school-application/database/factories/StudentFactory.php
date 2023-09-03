<?php

namespace Database\Factories;

use App\Models\User;
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
            "firstName" => fake()->firstName(),
            "lastName" => fake()->lastName(),
            "userId" => User::factory()->create()->id,
            "majot" => fake()->randomElement(["Math", "Science", "English", "History"]),
        ];
    }

    /**
     * define custom major
     */
    public function major(string $major): static
    {
        return $this->state(fn (array $attributes) => [
            "majot" => $major,
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            "subject" => fake()->randomElement(["Math", "Science", "English", "History"]),
        ];
    }

    /**
     * indicate custom subject
     */
    public function subject(string $subject): static
    {
        return $this->state(fn (array $attributes) => [
            "subject" => $subject,
        ]);
    }
}

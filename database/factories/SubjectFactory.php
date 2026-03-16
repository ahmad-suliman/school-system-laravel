<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
                $subjects = [
            'Math',
            'English',
            'Science',
            'Physics',
            'Chemistry',
            'Biology',
            'History',
            'Geography',
            'Arabic',
            'Computer'
        ];

        return [
            'name' => fake()->randomElement($subjects),
            'class_id' => null, // set in seeder
        ];
    }
}

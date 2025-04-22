<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Project;

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
        // Generate a random date between the start and end dates of the project
        $start = now()->setTime(rand(8, 12), 0);
        $end = (clone $start)->addHours(rand(1, 4));

        $taskNames = [
            'Design login page',
            'Build user registration',
            'Implement CRUD for tasks',
            'Set up database schema',
            'Test authentication flow'
        ];

        return [
            'name' => fake()->randomElement($taskNames),
            'description' => fake()->realTextBetween(40, 100),
            'project_id' => Project::inRandomOrder()->first()->id ?? Project::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'date' => now(),
            'start_time' => $start,
            'end_time' => $end,
            'time_spent' => $end->diffInHours($start),
            'status' => fake()->randomElement(['incomplete', 'complete']),
            'notes' => fake()->realTextBetween(20, 40),
            'link' => fake()->url,
        ];
    }
}

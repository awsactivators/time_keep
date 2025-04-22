<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projectNames = [
            'Build Timesheet App',
            'Client Website Redesign',
            'API Integration Service',
            'Company Branding Project',
            'Mobile App Development'
        ];
    
        return [
            'name' => fake()->randomElement($projectNames),
            'description' => fake()->realTextBetween(50, 100),
            'project_type' => fake()->randomElement(['Development', 'Design', 'Consulting']),
            'start_date' => now(),
            'due_date' => now()->addDays(rand(10, 90)),
            'status' => 'pending',
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'link' => fake()->url,
            'client_name' => fake()->company,
            'notes' => fake()->realTextBetween(20, 50),
            'price_per_hour' => fake()->randomFloat(2, 25, 100),
        ];
    }
}

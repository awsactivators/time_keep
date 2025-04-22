<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
        $user = User::where('email', 'genevieve@gmail.com')->first();
        $projects = Project::where('user_id', $user->id)->get();

        foreach ($projects as $project) {
            Task::factory()->count(2)->create([
                'user_id' => $user->id,
                'project_id' => $project->id,
            ]);
        }
    }
}

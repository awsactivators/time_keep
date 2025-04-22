<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Genevieve',
            'email' => 'genevieve@gmail.com',
            'password' => bcrypt('Admin@1234'),
            'role' => 'user',
        ]);

        User::factory(5)->create();
    }
}

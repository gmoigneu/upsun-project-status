<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Environment;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $projects = Project::factory(10)->create();

        $projects->each(function (Project $project): void {
            $project->environments()->saveMany(Environment::factory(3)->make());
        });

        foreach (Environment::all() as $environment) {
            $environment->activities()->saveMany(
                Activity::factory(random_int(0, 5))->make()
            );
        }
    }
}

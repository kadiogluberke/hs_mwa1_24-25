<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Task;
use App\Models\User;
use App\Models\Work;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Skill::factory(15)->create();
        Education::factory(5)->create();
        Work::factory(5)->create();
        Project::factory(10)->create();
        Article::factory(5)->create();
        Task::factory(15)->create();

        foreach (Education::all() as $education) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(0, 4))->get();
            $education->skills()->attach($list_of_skills);
        }

        foreach (Work::all() as $work) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(0, 4))->get();
            $work->skills()->attach($list_of_skills);
        }

        foreach (Task::all() as $task) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(0, 4))->get();
            $task->skills()->attach($list_of_skills);
        }

        foreach (Project::all() as $project) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(0, 4))->get();
            $project->skills()->attach($list_of_skills);
        }

        foreach (Article::all() as $article) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(0, 4))->get();
            $article->skills()->attach($list_of_skills);
        }

    }
}

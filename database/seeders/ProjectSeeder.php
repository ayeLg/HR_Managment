<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'HR management',
                'duration' => '5 months'
            ],
            [
                'name' => 'Hospital management',
                'duration' => '5 months'
            ],
            [
                'name' => 'School management',
                'duration' => '5 months'
            ]
        ];

        foreach($projects as $project) {
            Project::create($project);
        }
    }
}

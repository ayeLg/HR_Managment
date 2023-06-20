<?php

namespace Database\Seeders;

use App\Models\ProjectTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects_teams = [
            [
                'project_id' => 1,
                'team_id' => 1
            ],
            [
                'project_id' => 1,
                'team_id' => 2
            ],
            [
                'project_id' => 2,
                'team_id' => 1
            ],
            [
                'project_id' => 2,
                'team_id' => 2
            ]

        ];

        foreach($projects_teams as $project) {
            ProjectTeam::create($project);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Attendence extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attendence = [
            [
                'datetime' => date('Y-m-d H:i:s'),
                'status' => 1,
                'employee_id' => 1,
            ],
            [
                'datetime' => date('Y-m-d H:i:s'),
                'status' => 2,
                'employee_id' => 2,
            ],
            [
                'datetime' => date('Y-m-d H:i:s'),
                'status' => 1,
                'employee_id' => 3,
            ],
        ];
        foreach($attendence as $att) {
            Attendance::create($att);
        }
    }
}

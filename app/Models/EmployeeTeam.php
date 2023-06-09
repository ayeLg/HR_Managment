<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTeam extends Model
{
    use HasFactory;

    protected $table = 'employee_team';
    protected $fillable = ['employee_id', 'team_id'];

}

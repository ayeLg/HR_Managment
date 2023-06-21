<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'phone',
        'photo',
        'position',
        'salary',
        'role',
    ];
    public function attendance(){
        return $this->hasMany(Attendance::class);
    }
    public function team(){
        return $this->belongsToMany(Team::class, EmployeeTeam::class);
    }
}

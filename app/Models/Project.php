<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'duration'];

    public function team(){
        return $this->belongsToMany(Team::class, ProjectTeam::class);
    }
}

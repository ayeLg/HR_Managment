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
        'photo',
        'position',
        'salary',
        'role',
    ];
}

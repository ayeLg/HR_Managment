<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'employ_id',
    ];

    public function employ(){
        return $this->belongsTo(Employ::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'institution',
        'start_year',
        'end_year',
        'grade',
        'details',
    ];
}

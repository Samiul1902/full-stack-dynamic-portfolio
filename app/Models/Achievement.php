<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'institution',
        'achieved_at',
        'description',
        'certificate_url',
    ];

    protected $casts = [
        'achieved_at' => 'date',
    ];
}

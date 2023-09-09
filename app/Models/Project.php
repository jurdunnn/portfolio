<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'start_date',
        'completion_date',
        'website_link',
        'github_link',
    ];

    protected $casts = [
        'start_date' => 'date',
        'completion_date' => 'date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'start_date',
        'position',
        'completion_date',
        'is_intro',
        'intro_text',
        'cv_file',
        'message_text',
    ];

    protected $casts = [
        'start_date' => 'date',
        'completion_date' => 'date',
        'is_intro' => 'boolean',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class)->orderBy('position');
    }
}

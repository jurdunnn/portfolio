<?php

namespace App\Models;

use App\Enums\ComponentType;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'component',
        'component_data',
        'project_id'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'component' => AsEnumCollection::class . ':' . ComponentType::class,
        'component_data' => 'array'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

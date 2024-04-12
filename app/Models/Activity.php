<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'activity_id',
        'environment_id',
        'type',
        'state',
        'result',
        'started_at',
        'completed_at',
        'cancelled_at',
        'expires_at',
        'description',
        'text',
        'timing_wait',
        'timing_build',
        'timing_deploy',
        'timing_execute',
    ];

    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
}

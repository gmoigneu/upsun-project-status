<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project',
        'provider',
    ];

    public function environments(): HasMany
    {
        return $this->hasMany(Environment::class);
    }

    public function activities(): HasManyThrough
    {
        return $this->hasManyThrough(Activity::class, Environment::class);
    }
}

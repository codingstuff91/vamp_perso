<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chronicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function users(): BelongsTo
    {
        return $this->hasMany(User::class);
    }
}

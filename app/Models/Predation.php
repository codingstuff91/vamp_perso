<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Predation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function character(): HasOne
    {
        return $this->hasOne(Character::class);
    }
}

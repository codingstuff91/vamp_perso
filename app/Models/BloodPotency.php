<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BloodPotency extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "blood_potencies";

    public $timestamps = false;

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}

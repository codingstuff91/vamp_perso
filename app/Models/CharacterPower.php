<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterPower extends Pivot
{
    protected $table = "character_power";
    public $timestamps = false;
}

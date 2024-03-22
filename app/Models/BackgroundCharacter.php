<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BackgroundCharacter extends Pivot
{
    public $timestamps = false;

    protected $table = 'background_character';
}

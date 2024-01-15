<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeCharacter extends Pivot
{
    public $timestamps = false;

    protected $table = 'attribute_character';
}

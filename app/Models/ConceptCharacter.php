<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ConceptCharacter extends Pivot
{
    public $timestamps = false;

    protected $table = 'concept_character';
}

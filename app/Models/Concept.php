<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Concept extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function description(): MorphOne
    {
        return $this->morphOne(Description::class, 'descriptionable');
    }
}

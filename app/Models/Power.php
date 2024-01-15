<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Power extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    public function description(): MorphOne
    {
        return $this->morphOne(Description::class, 'descriptionable');
    }
}

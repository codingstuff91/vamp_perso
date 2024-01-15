<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Description extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function descriptionable(): MorphTo
    {
        return $this->morphTo();
    }
}

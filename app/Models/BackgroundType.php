<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class BackgroundType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function description(): MorphOne
    {
        return $this->morphOne(Description::class, 'descriptionable');
    }
}

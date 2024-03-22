<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Background extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(BackgroundType::class, 'background_type_id');
    }

    public function description(): MorphOne
    {
        return $this->morphOne(Description::class, 'descriptionable');
    }
}

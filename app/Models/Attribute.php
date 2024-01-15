<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Attribute extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function description(): MorphOne
    {
        return $this->morphOne(Description::class, 'descriptionable');
    }
}

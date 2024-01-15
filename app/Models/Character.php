<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Character extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chronicle(): BelongsTo
    {
        return $this->belongsTo(Chronicle::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_character', 'character_id')
            ->withPivot('attribute_value');
    }

    public function powers()
    {
        return $this->belongsToMany(Power::class, 'character_power', 'character_id');
    }

    public function predation(): BelongsTo
    {
        return $this->belongsTo(Predation::class);
    }

    public function compulsion(): BelongsTo
    {
        return $this->belongsTo(Compulsion::class);
    }

    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }
}

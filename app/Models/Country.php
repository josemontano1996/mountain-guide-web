<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    public function scopeWithEventCount(Builder $query)
    {
         $query->withCount('events');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

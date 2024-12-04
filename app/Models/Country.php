<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    protected $fillable =
        [
            'name',
            'display'
        ];

    public function scopeWithEventCount(Builder $query)
    {
        $query->withCount('events');
    }

    static public function createFromValidatedData(array $validatedData)
    {
        return self::create($validatedData);
    }

      public function events()
    {
        return $this->hasMany(Event::class);
    }
}

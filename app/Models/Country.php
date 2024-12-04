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

    /**
     * Scope a query to include the count of related events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */


    public function scopeWithEventCount(Builder $query)
    {
        $query->withCount('events');
    }

    /**
     * Create a new Country instance from validated data.
     *
     * @param array $validatedData
     * @return \App\Models\Country
     */
    static public function createFromValidatedData(array $validatedData)
    {
        return self::create($validatedData);
    }

    /**
     * Update the given Country instance with validated data.
     *
     * @param \App\Models\Country $country
     * @param array $validatedData
     * @return bool
     */
    static public function updateFromValidatedData(Country $country, array $validatedData)
    {
        return $country->update($validatedData);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

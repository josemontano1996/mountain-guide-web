<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /** @use HasFactory<\Database\Factories\RegionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'display'
    ];

    static public function scopeWithEventCount(Builder $query)
    {
        $query->withCount('events');
    }

    static public function scopeSearchByRow(Builder $query, string $row, string $searchTerm)
    {
        $query->where($row, 'like', '%' . $searchTerm . '%');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

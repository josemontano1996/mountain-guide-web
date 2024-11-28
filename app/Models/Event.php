<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;
    public static array $status = ['open', 'full', 'closed', 'canceled', 'archived', 'postponed'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function eventPhotos()
    {
        return $this->hasMany(EventPhoto::class);
    }

    public function eventPlans()
    {
        return $this->hasMany(EventPlan::class);
    }
    public function eventMaps()
    {
        return $this->hasMany(EventMap::class);
    }

    public function eventExtras()
    {
        return $this->hasMany(EventExtra::class);
    }

    public function eventNotIncludes()
    {
        return $this->hasMany(EventNotIncluded::class);
    }

    public function eventIncludes()
    {
        return $this->hasMany(EventIncluded::class);
    }

    public function eventPrices(){
        return $this->hasMany(EventPrice::class);
    }
}

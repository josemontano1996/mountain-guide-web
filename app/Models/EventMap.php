<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMap extends Model
{
    /** @use HasFactory<\Database\Factories\EventMapFactory> */
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

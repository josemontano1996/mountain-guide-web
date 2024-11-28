<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventNotIncluded extends Model
{
    /** @use HasFactory<\Database\Factories\EventNotIncludedFactory> */
    use HasFactory;

    protected $table = 'event_not_included';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

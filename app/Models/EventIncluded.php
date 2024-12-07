<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventIncluded extends Model
{
    /** @use HasFactory<\Database\Factories\EventIncludedFactory> */
    use HasFactory;

    protected $table = 'event_included';
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

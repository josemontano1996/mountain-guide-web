<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventExtra extends Model
{
    /** @use HasFactory<\Database\Factories\EventExtraFactory> */
    use HasFactory;

    public function event(){
        return $this->belongsTo(Event::class);
    }
}

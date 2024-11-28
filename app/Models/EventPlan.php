<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPlan extends Model
{
    /** @use HasFactory<\Database\Factories\EventPlansFactory> */
    use HasFactory;

    public function event(){
        return $this->belongsTo(Event::class);
    }
}

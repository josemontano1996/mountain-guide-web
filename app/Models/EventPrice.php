<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPrice extends Model
{
    /** @use HasFactory<\Database\Factories\EventPriceFactory> */
    use HasFactory;
    public static array $type = ['regular', 'promotion'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

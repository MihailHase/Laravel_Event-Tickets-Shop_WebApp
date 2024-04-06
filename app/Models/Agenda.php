<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'session',
        'workshop',
        'start_time',
        'end_time',
        'speaker',
        'topic',
        'room',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_name', 'name');
    }
}

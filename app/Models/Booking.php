<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_SPEAKER',
        'ID_EVENT',
    ];

    // Relatie many-to-one cu Event:
    public function event()
    {
        return $this->belongsTo(Event::class, 'ID_EVENT');
    }

    // Relatie many-to-one cu Speaker:
    public function speaker()
    {
        return $this->belongsTo(Speaker::class, 'ID_SPEAKER');
    }
}

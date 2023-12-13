<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titlu',
        'descriere',
        'date',
        'contact',
        'locatie',
        'ID_PARTENER',
        'ID_SPONSOR',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    // Relatie one-to-many cu Partener:
    public function partener()
    {
        return $this->belongsTo(Partener::class, 'ID_PARTENER');
    }

    // Relatie one-to-many cu Sponsor:
    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class, 'ID_SPONSOR');
    }
}

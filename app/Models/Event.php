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
        'ID_PARTENER',
        'ID_SPONSOR',
        'locatie',
    ];

    protected $casts = [
        'date' => 'datetime', // Convertim automat coloana 'date' la un obiect DateTime
    ];

    // Relatia cu Partener:
    /*
    public function partener()
    {
        return $this->belongsTo(Partener::class, 'ID_PARTENER');
    }
    */

    // Relatia cu Sponsor:
    /*
    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class, 'ID_SPONSOR');
    }
    */
}

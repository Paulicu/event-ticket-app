<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'nume',
        'prenume',
        'descriere',
    ];

    // Relatie one-to-many cu Booking:
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'ID_SPEAKER');
    }
}

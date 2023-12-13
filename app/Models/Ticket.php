<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'status',
        'ID_EVENT',
        'name',
        'quantity',
        'code',
    ];

    // Relatia cu Event:
    public function event()
    {
        return $this->belongsTo(Event::class, 'ID_EVENT');
    }
}

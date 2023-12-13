<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partener extends Model
{
    use HasFactory;

    protected $fillable = [
        'nume',
    ];

    // Relatia cu Event:
    
    public function events()
    {
        return $this->hasMany(Event::class, 'ID_PARTENER');
    }
    
}

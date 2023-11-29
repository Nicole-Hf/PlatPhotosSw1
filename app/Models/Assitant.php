<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assitant extends Model
{
    use HasFactory;

    protected $table = 'assitants';
    protected $fillable = [
        'eventoId',
        'guestId',
        'codeqr',
        'status',
    ];

    public function evento() {
        return $this->belongsTo(Evento::class, 'eventoId');
    }

    public function invitado() {
        return $this->belongsTo(Guest::class, 'guestId');
    }
}

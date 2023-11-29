<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model
{
    use HasFactory;

    protected $table = 'invitaciones';
    protected $fillable = [
        'evento_id',
        'fotografo_id',
        'estado',
    ];

    public function evento() {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function fotografo() {
        return $this->belongsTo(User::class, 'fotografo_id');
    }
}

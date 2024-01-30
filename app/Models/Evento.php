<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';
    protected $fillable = [
        'title',
        'address',
        'description',
        'create_date',
        'create_time',
        'organizer_id',
    ];

    public function organizer() {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function catalogo() {
        return $this->hasOne(Catalogo::class, 'evento_id');
    }

    public function invitaciones() {
        return $this->hasMany(Invitacion::class, 'evento_id');
    }

    public function asistencias() {
        return $this->hasMany(Assitant::class, 'eventoId');
    }
}

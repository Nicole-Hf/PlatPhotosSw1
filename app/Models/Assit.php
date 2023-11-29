<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assit extends Model
{
    use HasFactory;

    protected $table = 'assits';
    protected $fillable = [
        'evento_id',
        'guest_id',
        'status',
    ];

    public function evento() {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function invitado() {
        return $this->belongsTo(Guest::class, 'guest_id');
    }
}

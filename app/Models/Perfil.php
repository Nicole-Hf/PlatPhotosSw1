<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';
    protected $fillable = [
        'path',
        'invitado_id',
    ];

    public function invitado() {
        return $this->belongsTo(User::class, 'invitado_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogos';
    protected $fillable = [
        'title',
        'category',
        'evento_id',
    ];

    public function evento() {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function fotos() {
        return $this->hasMany(Foto::class, 'catalogo_id');
    }
}

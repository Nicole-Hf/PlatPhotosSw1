<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    protected $fillable = [
        'path',
        'price',
        'catalogo_id',
        'fotografo_id',
    ];

    public function catalogo() {
        return $this->belongsTo(Catalogo::class, 'evento_id');
    }

    public function fotografo() {
        return $this->belongsTo(User::class, 'fotografo_id');
    }

    public function detalles_compra() {
        return $this->hasMany(Detalle::class, 'foto_id');
    }
}

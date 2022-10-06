<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $table = 'detalles';
    protected $fillable = [
        'quantity',
        'subtotal',
        'foto_id',
        'compra_id',
    ];

    public function foto() {
        return $this->belongsTo(Foto::class, 'foto_id');
    }

    public function compra() {
        return $this->hasMany(Compra::class, 'compra_id');
    }
}

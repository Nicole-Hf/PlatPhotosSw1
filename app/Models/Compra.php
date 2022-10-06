<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $fillable = [
        'total',
        'order_date',
        'invitado_id'
    ];

    public function invitado() {
        return $this->belongsTo(User::class, 'invitado_id');
    }

    public function detalles() {
        return $this->hasMany(Detalle::class, 'compra_id');
    }
}

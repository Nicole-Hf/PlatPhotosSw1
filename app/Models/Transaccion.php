<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';
    protected $fillable = [
        'shippingMethod',
        'phone',
        'paymentMethod',
        'amount',
        'paymentDate',
        'compra_id'
    ];

    public function order()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }
}
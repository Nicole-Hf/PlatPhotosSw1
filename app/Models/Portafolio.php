<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    use HasFactory;

    protected $table = 'portafolios';
    protected $fillable = [
        'title',
        'path',
        'fotografo_id',
    ];

    public function fotografo() {
        return $this->belongsTo(User::class, 'fotografo_id');
    }
}

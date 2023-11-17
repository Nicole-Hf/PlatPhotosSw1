<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';
    protected $fillable = [
        'name',
        'email',
        'status',
        'evento_id'
    ];

    public function assits() 
    {
        return $this->hasMany(Assit::class, 'guest_id');
    }
}

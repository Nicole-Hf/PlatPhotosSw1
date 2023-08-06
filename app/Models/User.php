<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'type',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships with others models
     */

    public function eventos() {
        return $this->hasMany(Evento::class, 'organizer_id');
    }

    public function fotos() {
        return $this->hasMany(Foto::class, 'fotografo_id');
    }

    public function muestras() {
        return $this->hasMany(Muestra::class, 'fotografo_id');
    }

    public function perfiles() {
        return $this->hasMany(Perfil::class, 'invitado_id');
    }

    public function compras() {
        return $this->hasMany(Compra::class, 'invitado_id');
    }
}

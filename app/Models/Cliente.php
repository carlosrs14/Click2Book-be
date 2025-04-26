<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }

    public function valoraciones() {
        return $this->hasMany(Valoracion::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
}

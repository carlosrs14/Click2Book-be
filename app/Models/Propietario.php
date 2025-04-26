<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $table = 'propietarios';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }

    public function propiedades() {
        return $this->hasMany(Propiedad::class);
    }
}

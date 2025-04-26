<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';

    public function user() {
        return $this->belongsTo(User::class);
    }
}

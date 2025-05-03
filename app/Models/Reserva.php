<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'inicio',
        'fin',
        'pago_id',
        'cliente_id',
        'cuarto_id',
        'persona_id'
    ];

    public function tipoReserva() {
        return $this->belongsTo(TipoReserva::class);
    }

    public function cliente() {
        return $this->belongsTo(User::class);
    }

    public function cuarto() {
        return $this->belongsTo(Cuarto::class);
    }

    public function pago() {
        return $this->belongsTo(Pago::class);
    }

    public function estadosReserva() {
        return $this->hasMany(EstadoReserva::class);
    }
}
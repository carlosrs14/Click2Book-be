<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoPropiedad extends Model
{
    protected $table = 'fotospropiedad';
    
    protected $fillable = [
        'url',
        'propiedad_id'
    ];

    public function propiedad() {
        return $this->belongsTo(Propiedad::class);
    }
}

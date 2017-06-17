<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     protected $table = 'personas';

    protected $fillable = [
        'nombre','apellido', 'cedula', 'telefono', 'fecha_nacimiento','ubicacion', 'email',
    ];

    protected $primaryKey = 'email';
    public $incrementing = false;
}

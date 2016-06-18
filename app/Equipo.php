<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';

	 protected $fillable = [
        'id','id_quiniela','id_equipo','nombre','grupo',
    ];
}

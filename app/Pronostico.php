<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Pronostico extends Model
{
    protected $table = 'pronosticos';

	 protected $fillable = [
        'id_partido', 'goles_local','goles_visitante','id_user', 'id_quiniela',
    ];
}

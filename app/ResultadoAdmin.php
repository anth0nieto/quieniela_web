<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class ResultadoAdmin extends Model
{
    protected $table = 'resultado_admins';

	protected $fillable = [
        'id_partido','goles_local','goles_visitante','id_quiniela',
    ];
}

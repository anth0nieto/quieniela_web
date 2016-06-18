<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = 'partidos';

	protected $fillable = [
        'id_partido','id_quiniela','id_local','id_visitante', 'fecha','fase_grupo',
    ];
}

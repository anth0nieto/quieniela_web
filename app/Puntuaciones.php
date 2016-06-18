<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Puntuaciones extends Model
{
    protected $table = 'puntuaciones';

	 protected $fillable = [
        'id_user','ptos','ganadores', 'resultados','id_quiniela',
    ];
}

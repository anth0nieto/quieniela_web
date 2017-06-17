<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Quiniela extends Model
{
	protected $table = 'quinielas';

	 protected $fillable = [
        'id','nombre','costo', 'usuarios', 'ganadores', 'fecha_inicio', 'fecha_finalizacion',
    ];

}

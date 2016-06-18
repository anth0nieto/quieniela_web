<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class Quiniela extends Model
{
	protected $table = 'quinielas';

	 protected $fillable = [
        'id','nombre','costo', 'usuarios', 'ganadores', 'f_inicio', 'f_oferta', 'f_inscripcion','torneo_liga',
    ];

}

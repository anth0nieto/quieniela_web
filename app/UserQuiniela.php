<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class UserQuiniela extends Model
{
    protected $table = 'user_quinielas';

	 protected $fillable = [
        'id', 'id_quiniela','username','status',
    ];
}

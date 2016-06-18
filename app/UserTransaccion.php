<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;

class UserTransaccion extends Model
{
    protected $table = 'user_transacciones';

	 protected $fillable = [
        'id_quiniela','username','tipo_transaccion','banco_emisor','nro_cuenta','monto','fecha','nro_transaccion',
    ];
}

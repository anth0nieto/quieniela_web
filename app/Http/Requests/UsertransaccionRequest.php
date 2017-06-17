<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class UsertransaccionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_transaccion' => 'required',
            'banco_emisor' => 'required',
            'nro_cuenta' => 'required|digits:20',
            'monto' => 'required',
            'fecha' => 'required',
            'nro_transaccion' => 'required',
        ];
    }

    
}

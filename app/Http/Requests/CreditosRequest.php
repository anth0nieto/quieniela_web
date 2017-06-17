<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class CreditosRequest extends Request
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
            'monto' => 'required',
            'user_email' => 'required',
            'cuantroUltimos' => 'required',
            'banco_emisor' => 'required',
            'nro_cuenta' => 'required',
        ];
    }
}

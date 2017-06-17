<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class Pronosticorequest extends Request
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
            'goles_local_0' => 'required',
            'goles_local_1' => 'required',
            'goles_local_2' => 'required',
            'goles_local_3' => 'required',
            'goles_local_4' => 'required',
            'goles_local_5' => 'required',
            'goles_local_6' => 'required',
            'goles_local_7' => 'required',
            'goles_local_8' => 'required',
            'goles_local_9' => 'required',
            'goles_local_10' => 'required',
            'goles_local_11' => 'required',
            'goles_local_12' => 'required',
            'goles_local_13' => 'required',
            'goles_local_14' => 'required',
            'goles_local_15' => 'required',
            'goles_local_16' => 'required',
            'goles_local_17' => 'required',
            'goles_local_18' => 'required',
            'goles_local_19' => 'required',
            'goles_local_20' => 'required',
            'goles_local_21' => 'required',
            'goles_local_22' => 'required',
            'goles_local_23' => 'required',
            'goles_local_24' => 'required',
            'goles_local_25' => 'required',
            'goles_local_26' => 'required',
            'goles_local_27' => 'required',
            'goles_local_28' => 'required',
            'goles_local_29' => 'required',
            'goles_local_30' => 'required',
            'goles_local_31' => 'required',
            'goles_local_32' => 'required',
            'goles_local_33' => 'required',
            'goles_local_34' => 'required',
            'goles_local_35' => 'required',

            'goles_visitante_0' => 'required',
            'goles_visitante_1' => 'required',
            'goles_visitante_2' => 'required',
            'goles_visitante_3' => 'required',
            'goles_visitante_4' => 'required',
            'goles_visitante_5' => 'required',
            'goles_visitante_6' => 'required',
            'goles_visitante_7' => 'required',
            'goles_visitante_8' => 'required',
            'goles_visitante_9' => 'required',
            'goles_visitante_10' => 'required',
            'goles_visitante_11' => 'required',
            'goles_visitante_12' => 'required',
            'goles_visitante_13' => 'required',
            'goles_visitante_14' => 'required',
            'goles_visitante_15' => 'required',
            'goles_visitante_16' => 'required',
            'goles_visitante_17' => 'required',
            'goles_visitante_18' => 'required',
            'goles_visitante_19' => 'required',
            'goles_visitante_20' => 'required',
            'goles_visitante_21' => 'required',
            'goles_visitante_22' => 'required',
            'goles_visitante_23' => 'required',
            'goles_visitante_24' => 'required',
            'goles_visitante_25' => 'required',
            'goles_visitante_26' => 'required',
            'goles_visitante_28' => 'required',
            'goles_visitante_29' => 'required',
            'goles_visitante_30' => 'required',
            'goles_visitante_31' => 'required',
            'goles_visitante_32' => 'required',
            'goles_visitante_33' => 'required',
            'goles_visitante_34' => 'required',
            'goles_visitante_35' => 'required',
        ];
    }
}

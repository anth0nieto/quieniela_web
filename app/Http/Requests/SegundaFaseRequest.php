<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class SegundaFaseRequest extends Request
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

        ];
    }
}

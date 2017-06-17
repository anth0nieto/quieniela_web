<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class PartidoRequest extends Request
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
        $grupos = array('A','B','C','D','E','F');

            for ($j = 0; $j < 6; $j++){
                $grupo = $grupos[$j];
                for ($i = 1; $i <= 6; $i++) {
                     return [
                            'local_'.$i.$grupo => 'required|string:3',
                            'visitante_'.$i.$grupo => 'required|string:3',
                            'fecha'.$i.$grupo => 'required|date',
                    ];
                }
            }
    }
}

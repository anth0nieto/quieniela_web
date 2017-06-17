<?php

namespace quiniela\Http\Requests;
use Carbon\Carbon;
use quiniela\Http\Requests\Request;

class QuinielaRequest extends Request
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
            'usuarios' => 'integer:20,1000',
            'costo' => 'numeric:200,100000',
            'ganadores' => 'digits_between:1,10',
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_finalizacion' => 'required|date',
        ];
    }
}

<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class UserRequest extends Request
{
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
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'fecha_nacimiento' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ];
    }
}

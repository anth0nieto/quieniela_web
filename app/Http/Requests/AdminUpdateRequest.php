<?php

namespace quiniela\Http\Requests;

use quiniela\Http\Requests\Request;

class AdminUpdateRequest extends Request
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
        return {
            
            'username' => 'required|unique:admins',
            'username' => 'required|unique:users',
            'email' => 'required|unique:admins',
            'email' => 'required|unique:users',
            'email' => 'required|email',
        }
        ];
    }
}

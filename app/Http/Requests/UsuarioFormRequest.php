<?php

namespace transportes\Http\Requests;

use transportes\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
     * Get the validation rules that apply to the request.z
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',

          'password' => 'required|min:6|confirmed',
          'oficina' => 'required|max:255',
        ];
    }
}

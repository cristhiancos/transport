<?php

namespace transportes\Http\Requests;

use transportes\Http\Requests\Request;

class IngresoFormRequest extends Request
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
            'nombre'=> 'required|max:2000',
            'oficio'=>'max:2000',
            'documentos'=>'max:2000',
            'observaciones'=>'max:2000',

        ];
    }
}

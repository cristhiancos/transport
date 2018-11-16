<?php

namespace transportes\Http\Requests;

use transportes\Http\Requests\Request;

class Ingreso2FormRequest extends Request
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

            'nombre'=>  'required|max:2000',
            'numlicencia'=> 'max:2000',
            'tipoinfraccion'=> 'max:2000',
            'sancion'=> 'max:2000',
            'multa'=> 'max:2000',
            'rdrnumero'=> 'max:2000',
            'rdrfecha'=> 'max:2000',
            'puntoacum'=> 'max:2000',
            'levoficio'=> 'max:2000',
            'levfecha'=> 'max:2000',

        ];
    }
}

<?php

namespace transportes\Http\Requests;

use transportes\Http\Requests\Request;

class Ingreso4FormRequest extends Request
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
          'numlicencia'=> 'required|max:20',
          'tipolicencia'=> 'max:10' ,
          'nombre'=> 'max:2000',
          'clase'=> 'max:10',
          'categoria'=> 'max:10',
          'fechaexpe'=> 'max:255',
          'fechavenc'=> 'max:255',
          'numfichamed'=> 'max:255',
          'fechamed'=> 'max:255',
          'restriccionesmed'=> 'max:50',
          'registrodeconduc'=> 'max:255',
          'numanterior'=> 'max:255',
        ];
    }
}

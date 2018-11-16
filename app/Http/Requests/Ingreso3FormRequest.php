<?php

namespace transportes\Http\Requests;

use transportes\Http\Requests\Request;

class Ingreso3FormRequest extends Request
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
          'numacta' =>  'required|max:1000',
          'fecha'=> 'max:2000',
          'placavehiculo'=> 'max:2000',
          'servicio'=> 'max:2000',
          'lugar'=> 'max:2000',
          'razonsocial'=> 'max:2000',
          'nombre'=> 'max:2000',
          'domicilio'=> 'max:2000',
          'motivo'=> 'max:2000',
          'codigo'=> 'max:2000',
          'documentoret'=> 'max:2000',
          'inspector'=> 'max:2000',

        ];
    }
}

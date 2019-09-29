<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstablecimientoFormRequest extends FormRequest
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
          'nombre'=> 'required|string|max:150',
          'direccion'=> 'required|string|max:100',
          'departamento'=> 'required|string|max:45',
          'ciudad'=> 'required|string|max:45',
          'logo'=> 'mimes:jpg,bmp,png',
          'telefono1'=> 'required|string|max:15',
          'telefono2'=> 'required|string|max:15'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudiantesFormRequest extends FormRequest
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
          'codigo'=> 'required|string|max:45',
          'nombres'=> 'required|string|max:45',
          'apellidos'=> 'required|string|max:45',
          'fecha_nac',
          'direccion'=> 'required|string|max:100',
          'clave',
          'certificado',
          'foto',
          'estado',
          'genero_id'
        ];
    }
}

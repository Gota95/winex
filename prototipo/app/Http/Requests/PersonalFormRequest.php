<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalFormRequest extends FormRequest
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
          'nombres'=> 'required|string|max:45',
          'apellidos'=> 'required|string|max:45',
          'fecha_nac',
          'lugar_nac'=> 'required|string|max:100',
          'estado_civil'=> 'required|string|max:45',
          'direccion'=> 'required|string|max:100',
          'inicio_labores',
          'foto'=> 'required|string|max:255',
          'cui'=> 'required|string|max:25',
          'telefono'=> 'required|string|max:15',
          'correo'=> 'required|string|max:100',
          'estado',
          'cargo_id',
          'usuario_id',
          'centro_id',
          'genero_id'
        ];
    }
}

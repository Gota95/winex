<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EncargadosFormRequest extends FormRequest
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
          'direccion'=> 'required|string|max:45',
          'telefono'=> 'required|string|max:15',
          'cui'=> 'required|string|max:25',
          'parentesco'=> 'required|string|max:45',
          'genero_id',
          'estudiante_id'
        ];
    }
}

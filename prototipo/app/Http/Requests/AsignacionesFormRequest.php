<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignacionesFormRequest extends FormRequest
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
          'fecha_asignacion',
          'nuevo_reingreso',
          'estudiante_id'=>['unique:asignacion'],
          'ciclo_id',
          'seccion_id',
          'grado_id',
          'carrera_id'
        ];
    }
}

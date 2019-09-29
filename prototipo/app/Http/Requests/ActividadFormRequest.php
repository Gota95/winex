<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadFormRequest extends FormRequest
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
          'Nombre_Actividad',
          'Detalle',
          'Fecha_inicio',
          'Fecha_fin',
          'Punteo',
          'Observaciones',
          'curso_id'
        ];
    }
}

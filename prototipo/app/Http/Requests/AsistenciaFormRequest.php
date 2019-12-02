<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaFormRequest extends FormRequest
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
          'Hora','require',
          'Fecha','require',
          'idcarrera','require',
          'idgrado','require',
          'idseccion','require',
          'idalumno','require',
          'idasistencia','require',
          'presente','require'
        ];
    }
}

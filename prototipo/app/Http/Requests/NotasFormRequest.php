<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotasFormRequest extends FormRequest
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
          'nota',
          'aspecto_id',
          'estudiante_id',
          'tipo_evaluacion',
          'bimestre_id',
          'curso_id'
        ];
    }
}

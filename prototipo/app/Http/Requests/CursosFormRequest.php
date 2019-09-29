<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosFormRequest extends FormRequest
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
          'codigo'=> 'required|string|max:10',
          'curso'=> 'required|string|max:45',
          'descripcion'=> 'required|string|max:45',
          'estado',
          'grado_id',
          'personal_id'
        ];
    }
}

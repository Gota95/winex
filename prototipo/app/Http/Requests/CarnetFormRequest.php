<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarnetFormRequest extends FormRequest
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
          'numerocarnet'=> 'required|string|max:45',
          'codigo_qr',
          'estudiante_id',
          'seccion_id'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LojaRequest extends FormRequest
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
            'nome' => 'required | min:4',
            'descricao' => '',
            'telefone' => 'required',
            'slug'
        ];
    }

    public function messages(){
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Este campo deve conter no mínimo 4 caracteres',
            'numeric' => 'Este campo só pode conter números'
        ];
    }
}

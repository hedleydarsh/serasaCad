<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'cpf'  => 'required | unique:clientes',
            'endereco',
            'email' => 'required',
            'descricao',
            'telefone',
            'anexo.*' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
        ];
    }

    public function messages(){
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Este campo deve conter no mínimo 4 caracteres',
            'numeric' => 'Este campo só pode conter números',
            'unique' => 'Este cpf já está cadastrado'
        ];
    }
}

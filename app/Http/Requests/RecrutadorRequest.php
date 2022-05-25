<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecrutadorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        switch($this->method()) {//cada método vai ter regras diferentes
            case 'POST':
            {
                return [
                    'nome' => 'required',
                    'cpf' => 'required|unique:recrutadores,cpf',
                    'email' => 'required|unique:recrutadores,email',
                    'password' => 'required|confirmed',
                    'ativo' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required',
                    'cpf' => 'required|unique:recrutadores,cpf,'.$this->recrutador->id,
                    'email' => 'required|unique:recrutadores,email,'.$this->recrutador->id,
                    'password' => 'confirmed',
                    'ativo' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            'nome.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'A senha é obrigatória',
            'password.confirmed' => 'Senhas não conferem',
            'ativo.required' => 'O status é obrigatório',
            'empresa_id.required' => 'A empresa é obrigatória',
        ];
    }
}

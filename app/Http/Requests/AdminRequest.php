<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                    'email' => 'required|unique:admins,email',
                    'password' => 'required|confirmed',
                    'ativo' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required',
                    'email' => 'required|unique:admins,email,'.$this->admin->id,
                    'password' => 'confirmed',
                    'ativo' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'A senha é obrigatória',
            'password.confirmed' => 'Senhas não conferem',
            'ativo.required' => 'O status é obrigatório',
        ];
    }
}

<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\FormRequest as ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends ApiFormRequest
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
                    'cnpj' => 'required|unique:empresas,cnpj',
                    'razao_social' => 'required',
                    'nome_fantasia' => 'required',
                    'email' => 'required|unique:empresas,email',
                    'password' => 'required',
                    // 'ativo' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'cnpj' => 'required|unique:empresas,cnpj,'.$this->admin->id,
                    'razao_social' => 'required',
                    'nome_fantasia' => 'required',
                    'email' => 'required|unique:admins,email,'.$this->admin->id,
                    'password' => 'confirmed',
                    // 'ativo' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'cnpj.required' => 'O CNPJ é obrigatório',
            'razao_social.required' => 'A razão social é obrigatória',
            'nome_fantasia.required' => 'O nome fantasia é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'A senha é obrigatória',
            'password.confirmed' => 'Senhas não conferem',
            'ativo.required' => 'O status é obrigatório',
        ];
    }
}

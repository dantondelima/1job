<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\FormRequest as ApiFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends ApiFormRequest
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
                    'cpf' => 'required|unique:candidatos,cpf',
                    'nome' => 'required',
                    'email' => 'required|unique:candidatos,email',
                    'password' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'cpf' => 'required|unique:candidatos,cpf,'.$this->candidato->id,
                    'nome' => 'required',
                    'email' => 'required|unique:candidatos,email,'.$this->candidato->id,
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
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtapaProcessoRequest extends FormRequest
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
                    'vaga_id' => 'required',
                    'nome' => 'required',
                    'descricao' => 'required',
                    'ativa' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'vaga_id' => 'required',
                    'nome' => 'required',
                    'descricao' => 'required',
                    'ativa' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'vaga_id.required' => 'A vaga é obrigatória',
            'nome.required' => 'O nome é obrigatório',
            'descricao.required' => 'A descrição é obrigatória',
            'ativa.required' => 'O status é obrigatório',
        ];
    }
}

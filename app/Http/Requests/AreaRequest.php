<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
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
                    'nome' => 'required|unique:areas,nome',
                    'ativo' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required|unique:areas,nome,'.$this->area->id,
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
            'nome.unique' => 'A categoria já existe',
            'ativo.required' => 'O status é obrigatório',
        ];
    }
}

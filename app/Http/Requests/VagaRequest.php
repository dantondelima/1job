<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaRequest extends FormRequest
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
                    'titulo' => 'required',
                    'regime_contratual' => 'required',
                    'quantidade' => 'required',
                    'remuneracao' => 'required',
                    'modalidade' => 'required',
                    'descricao' => 'required',
                    'area_id' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'titulo' => 'required',
                    'regime_contratual' => 'required',
                    'quantidade' => 'required',
                    'remuneracao' => 'required',
                    'modalidade' => 'required',
                    'descricao' => 'required',
                    'area_id' => 'required',
                    'empresa_id' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'regime_contratual.required' => 'O regime contratual é obrigatório',
            'quantidade.required' => 'A quantidade é obrigatória',
            'remuneracao.required' => 'A remuneração é obrigatória',
            'modalidade.required' => 'A modalidade é obrigatória',
            'descricao.required' => 'A descrição é obrigatória',
            'area_id.required' => 'A área é obrigatória',
            'empresa_id.required' => 'A empresa é obrigatória',
        ];
    }
}

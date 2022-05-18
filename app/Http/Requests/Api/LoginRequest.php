<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\FormRequest as ApiFormRequest;

class LoginRequest extends ApiFormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O email é obrigatório',
            'password.required' => 'A senha é obrigatória',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|confirmed',
            'token' => 'required|exists:password_resets,token'
        ];
    }

    public function messages(){
        return [
            'email.required' => "Erro! Não foi possível verificar o usuário",
            'token.required' => "Erro! Não foi possível verificar o usuário",
            'token.exists' => "Erro! Não foi possível verificar o usuário",
            'email.exists' => "Erro! Não foi possível verificar o usuário",
            'password.confirmed' => 'Senhas não conferem',
        ];
    }
}

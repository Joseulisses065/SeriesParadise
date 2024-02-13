<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'email'=>['required','min:5','email'],
            'password'=>['required','min:3'],

            //
        ];
    }
    public function messages(){
        return[
            'email.min'=>'O campo nome deve ter no mínimo 5 caracteres',
            'email.email'=>'E-mail invalido',
            'email.required'=>'O campo e-mail é obrigatório',
            'password.required'=>'O campo senha é obrigatorio',
            'password.min'=>' campo senha deve ter no mínimo 3 caracteres'
        ];
    }
}

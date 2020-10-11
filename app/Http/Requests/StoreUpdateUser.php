<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'min:3','max:255'],
            'email' => ['required', 'string', 'email', 'min:10','max:255', "unique:users,email,{$id},id"],
            'password' => ['required', 'string', 'min:8','max:16', 'confirmed'],
        ];

        /**
         *** dd($this->method());//recupera o Metodo ***
         *
         * Se está retornando o PUT é por que está editando
         * Se estuver cadastrando retornaria POST
         */
        if ($this->method() == 'PUT'){
            $rules ['password'] = ['nullable', 'string', 'min:8','max:16', 'confirmed'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'O Usuário precisa de um Nome!',
            'name.min' => 'O Nome do Usuário, precisa de 3 caracteres no ménimo.',
            'name.max' => 'O Nome do Usuário pode ter 255 caracteres no máximo.',

            'email.required' => 'Precisa colocar um email.',
            'email.min' => 'O e-mail, não pode ter menos de 10 caracters.',
            'email.min' => 'O e-mail, não pode ter mais que 255 caracters.',
            'email.unique' => 'Esse e-mail já existe em nosso Banco de Dados! Use um e-mail diferente.',

            'password.required' => 'Você precisa colocar uma senha.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.max' => 'A senha não pode ter mais de 16 caracteres.',
            'password.confirmed' => 'A senha não está semelhante.',
        ];
    }
}

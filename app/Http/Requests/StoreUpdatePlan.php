<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        $url = $this->segment(3);
        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url",
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'description' => 'nullable|min:3|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Seu plano precisa ter um nome! Preencha o campo nome (:',
            'name.min' => '3 caracteres! Esse é o número minimo que o Nome precisa ter.',
            'name.max' => 'O Nome pode ter 255 caracteres no máximo.',
            'name.unique' => 'O nome já está sendo usado.',
            'price.required' => 'Parece que você esqueceu de colocar o Preço! Se o plano for grátis preencha com Zero.',
            'price.regex' => 'Formato inválido, use ponto. Assim: (1.99), A VIRGULA NÃO É ACEITA.',
            'description.min' => 'A descrição deve ter pelo menos 3 caracteres.',
            'description.max' => 'A descrição não pode ter mais de 5.000 caracteres.',
        ];
    }
}

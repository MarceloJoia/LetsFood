<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRole extends FormRequest
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

        return [
            'name' => ['required','min:3','max:255',"unique:roles,name,{$id},id"],
            'description' => 'nullable|min:3|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O perfil precisa de um nome!',
            'name.min' => 'O Nome do perfil, precisa de 3 caracteres no ménimo.',
            'name.max' => 'O Nome pode ter 255 caracteres no máximo.',
            'name.unique' => 'Já existe um perfil com esse nome. Tente um nome diferente.',
            'description.min' => 'A Descrição precisa de 3 caracteres no mínimo.',
            'description.max' => 'A Descrição pode conter 2000 caracteres no máximo.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
            'name' => "required|min:3|max:255|unique:permissions,name,{$id},id",
            'description' => 'nullable|min:3|max:2000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A Permissão precisa ter um nome.',
            'name.min' => 'O Nome da permissão precisa de 3 caracteres no mínimo.',
            'name.max' => 'O Nome pode ter 255 caracteres no máximo.',
            'name.unique' => 'Já existe uma permissão com esse nome. Escolha um nome diferente.',
            'description.min' => 'A Descrição precisa de no mínimo 3 caracteres.',
            'description.max' => 'A Descrição pode ter 2000 caracteres no máximo.',
        ];
    }
}

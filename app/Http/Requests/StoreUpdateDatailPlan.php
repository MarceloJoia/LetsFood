<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDatailPlan extends FormRequest
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
       $id = $this->segment(5);

        return [
            'name' => "required|min:3|max:255|unique:details_plan,name,{$id},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  'O campo Nome é obrigatyório.',
            'name.min' =>  'O Nome precisa de 3 caracteres no mínimo.',
            'name.max' =>  '255 caracteres é máximo no campo Nome.',
            'name.unique' =>  'Esse nome já está sendo usado, tente um nome diferente.',
        ];
    }
}

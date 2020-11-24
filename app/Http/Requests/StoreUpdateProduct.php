<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
     * dd($this->method());//recupera o Metodo ***
     * Se está retornando o PUT é por que está editando
     * Se estuver cadastrando retornaria POST
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);

        $rules = [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                //"unique:products,title,{$id},id"
                new UniqueTenant('products', $id),
        ],
            'price' => ['required', "regex:/^\d+(\.\d{1,2})?$/"],
            'image' => ['required','image'],
            'description' => ['required','min:3', 'max:1000'],
        ];

        if ($this->method() == 'PUT'){
            $rules ['image'] = ['nullable', 'image'];
        }

        return $rules;
    }
}

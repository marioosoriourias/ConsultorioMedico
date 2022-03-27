<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedic extends FormRequest
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
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'age'  => 'required|numeric|digits_between:1,3',
                'gender'=> 'required',
                'phone'=> 'nullable|numeric|digits_between:10,12',
                'email'=> 'nullable|email|unique:medics',
                'address' => 'nullable'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'age' => 'edad',
            'gender'=> 'sexo',
            'phone'=> 'telefono',
            'email'=> '',
            'address' => 'direccion'
        ];
    }

    public function messages(){
        return [
        'name.regex' => 'Solo se permiten letras',
        ];
    }
}

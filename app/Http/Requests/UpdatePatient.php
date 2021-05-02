<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdatePatient extends FormRequest
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
    public function rules(Request $request)
    {

        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'age'  => 'required|numeric|digits_between:1,3',
            'gender'=> 'required',
            'phone'=> 'nullable|numeric|digits_between:10,12',
            'email' => 'nullable|email|unique:patients,email,' . $request->id,
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
        'email.unique' => 'Ya existe un usuario con ese correo, ingrese otro'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultation extends FormRequest
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
            'symptoms' => 'required',
            'diagnostic' => 'required',
            'treatment' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'symptoms' => 'sintomas',
            'diagnostic' => 'diagnostico',
            'treatment'=> 'tratamiento',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateAppointment extends FormRequest
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
            'patient_id' => 'required',
            'hour' =>  [
                'required', 
                Rule::unique('appointments')
                       ->where('date', $request->date)
                       ->where('hour', $request->hour)
            ],
            'date' => 'required|date|after:today'
        ];
    }

    public function messages(){
        return [
        'patient_id.required' => 'Debe seleccionar un paciente',
        'hour.required' => 'Debe seleccionar una hora',
        'hour.unique' => 'Ya hay una cita a esa hora',
        'date.after' => 'La fecha debe ser mayor al dia de hoy'
        ];
    }
}

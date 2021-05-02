<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\BloodType;
use App\Models\Clinic;

class cuadroController extends Controller
{
    //
    public function crear($patient)
    {
        $patient = Patient::find($patient);       
        $bloodtype = BloodType::pluck('name', 'id');
        
        return view('clinics.create', compact('patient', 'bloodtype'));
    }

    public function guardar(Request $request)
    {

        $request->validate([
            'weight'=>'required|numeric|between:1,999',
            'height'=>'required|numeric|digits_between:1,5',
            'blood_type_id'=>'required'
        ]);

        $clinic = Clinic::create($request->all());
        $patient = Patient::find($clinic->patient_id);
       
        return redirect()->route('clinics.editar', $patient)->with('info', 'El cuadro clinico se actualizo con exito');;
    }


    public function editar($patient)
    {
        $patient = Patient::find($patient); 
        $clinic = Clinic::where('patient_id', $patient->id)->first();
        $bloodtype = BloodType::pluck('name', 'id');

        return view('clinics.edit', compact('bloodtype', 'clinic'));
    }

    public function actualizar(Request $request, Clinic $clinic)
    {
        
        $clinic->update($request->all());
        $patient = Patient::find($clinic->patient_id);

        return redirect()->route('clinics.editar', $patient)->with('info', 'El cuadro clinico se agrego con exito');
    } 
}

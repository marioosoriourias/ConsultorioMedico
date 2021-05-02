<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultation;
use App\Models\Appointment;
use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        return view('consultations.index');
    }

    public function consult(Appointment $appointment)
    {
        return view('consultations.consult', compact('appointment'));
    }

    public function store(StoreConsultation $request)
    {
        $current_date = Carbon::now('America/Mazatlan')->format('Y-m-d');
        $request['date'] = $current_date;
        
        $appointment = Appointment::find($request['appointment_id']);
        $appointment->state  = 2;
        $appointment->save();

        Consultation::create($request->all());
        return  redirect()->route('consultations.index')->with('info', 'Consulta realizada ocn exito');
    }

    public function edit(Consultation $consultation)
    {
        return view('consultations.edit', compact('consultation'));
    }

    public function update(StoreConsultation $request, Consultation $consultation)
    {
        $consultation->update($request->all());
        return redirect()->route('consultations.edit', $consultation)->with('info', 'La consulta se modifico con exito');
    }
}

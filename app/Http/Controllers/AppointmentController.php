<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreAppointment;
use App\Http\Requests\UpdateAppointment;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    
    public function index()
    {

        return view('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.crate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointment $request)
    {
        // $current_date = Carbon::now('America/Mazatlan')->format('Y-m-d');
        // $current_hour = Carbon::now('America/Mazatlan')->format('h:m');
        $request['state'] = 1;
        $appointment = Appointment::create($request->all());
        return redirect()->route('appointments.edit', $appointment)->with('info', 'La cita se agrego con exito');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $current_date = Carbon::now('America/Mazatlan')->format('Y-m-d');
        return view('appointments.editform', compact('appointment', 'current_date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointment $request, Appointment $appointment)
    {
        $appointment->update($request->all());
        return redirect()->route('appointments.edit', $appointment)->with('info', 'La cita se modifico con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index', $appointment)->with('info', 'La cita se elimino con exito');
    }
}

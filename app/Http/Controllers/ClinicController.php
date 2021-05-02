<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Clinic;
use App\Models\Patient;

use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clinic = Clinic::create($request->all());
        return redirect()->route('clinics.edit', $clinic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patient)
    {
        $patient = Patient::find($patient);       
        $bloodtype = BloodType::pluck('name', 'id');
        
        return view('clinics.create', compact('patient', 'bloodtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($patient)
    {
        $patient = Patient::find($patient); 
        $clinic = Clinic::where('patient_id', $patient->id)->get();
        $bloodtype = BloodType::pluck('name', 'id');

        return $clinic;
        return view('clinics.edit', compact('bloodtype', 'clinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Medic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMedic;
use App\Http\Requests\UpdateMedic;

class MedicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedic $request)
    { 
        $medic = Medic::create($request->all());
        return redirect()->route('medics.edit', $medic)->with('info', 'El medico se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medic = Medic::find($id);
        return view('medics.show', compact('medic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medic $medic)
    {
        return view('medics.edit', compact('medic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedic $request, Medic $medic)
    {    
        $medic->update($request->all());
        return redirect()->route('medics.edit', $medic)->with('info', 'El medico se edito correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medic $medic)
    {
        $medic->delete();
        return redirect()->route('patients.index')->with('info', 'El medico se elimino con exito');;
    }


}

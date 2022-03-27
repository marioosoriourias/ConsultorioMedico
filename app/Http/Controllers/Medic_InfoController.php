<?php

namespace App\Http\Controllers;

use App\Models\Medic;
use Illuminate\Http\Request;

class Medic_InfoController extends Controller
{
    public function appointments($id)
    {
        $medic = Medic::find($id);
        return view('medics.info.index', compact('medic'));
    }

    public function consultations($id)
    {
        $medic = Medic::find($id);
        return view('medics.info.consultations', compact('medic'));
    }
}

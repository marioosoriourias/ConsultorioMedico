<?php

namespace App\Http\Livewire\Medics;

use App\Models\Medic;
use Livewire\Component;
use Livewire\WithPagination;

class MedicConsultations extends Component
{
    use WithPagination;
    public $search;
    public $medic;

    public function render()
    {
        $search = $this->search;        
        
        $consultations = Medic::join('appointments', 'appointments.medic_id', '=', 'medics.id')
        ->join('consultations', 'consultations.appointment_id', '=', 'appointments.id') 
        ->join('patients', 'patients.id', '=', 'appointments.patient_id') 
        ->select('consultations.date', 'medics.name as medic', 'patients.name as patient', 'consultations.symptoms', 'consultations.diagnostic', 'consultations.treatment', 'consultations.observations')
        ->where('appointments.medic_id', '=' , $this->medic->id)
        ->where('patients.name', 'LIKE', '%' . $this->search . '%')
        ->paginate(8);
        
        return view('livewire.medics.medic-consultations', compact('consultations'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

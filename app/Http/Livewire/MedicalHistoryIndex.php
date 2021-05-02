<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class MedicalHistoryIndex extends Component
{
    use WithPagination;
    public $search;
    public $patient;

    public function mount(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function render()
    {

        $consultations = Consultation::join('appointments', 'consultations.appointment_id', '=', 'appointments.id')
        ->join('patients', 'patients.id', '=', 'appointments.patient_id') 
        ->select('consultations.date', 'patients.name', 'consultations.symptoms', 'consultations.diagnostic', 'consultations.treatment', 'consultations.observations')
        ->where('appointments.patient_id', '=' , $this->patient->id)->paginate(8);

        return view('livewire.medical-history-index', compact('consultations'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

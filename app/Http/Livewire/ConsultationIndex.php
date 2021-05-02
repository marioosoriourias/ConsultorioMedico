<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use Livewire\Component;
use Livewire\WithPagination;

class ConsultationIndex extends Component
{
    use WithPagination;
    public $search; 
    
    public function render()
    {
        $consultations = Consultation::join('appointments', 'consultations.appointment_id', '=', 'appointments.id')
        ->join('patients', 'patients.id', '=', 'appointments.patient_id') 
        ->select('consultations.id', 'consultations.date', 'patients.name', 'consultations.symptoms', 'consultations.diagnostic', 'consultations.treatment')
        ->where('patients.name', 'LIKE', '%' . $this->search . '%')  
        ->orwhere('consultations.date', 'LIKE', '%' . $this->search . '%')->paginate(8);


        return view('livewire.consultation-index', compact('consultations'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

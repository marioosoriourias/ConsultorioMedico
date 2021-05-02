<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentIndex extends Component
{
    public $search;
    use WithPagination;
    
    public function render()
    {
        
        $patients = Patient::all();
        
        $appointments = Appointment::join('patients', 'patients.id', '=', 'patient_id')
        ->select('appointments.id','patients.name', 'hour', 'date')
        ->where('appointments.state', '=', 1)
        ->where(function ($q) {
            $q->where('patients.name', 'LIKE', '%' . $this->search . '%')  
              ->orwhere('appointments.date', 'LIKE', '%' . $this->search . '%');
        })->orderBy('appointments.date', 'ASC')->paginate(8);

       
        
        return view('livewire.appointment-index', compact('appointments', 'patients'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

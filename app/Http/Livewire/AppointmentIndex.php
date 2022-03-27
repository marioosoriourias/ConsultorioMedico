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

    public $valor;
    public $order;

    public function mount(){
        $this->valor = 'date';
        $this->order = 'asc';
    }
    
    public function render()
    {
        
        $patients = Patient::all();
        
        $appointments = Appointment::join('patients', 'patients.id', '=', 'patient_id')
        ->join('medics', 'medics.id', '=', 'medic_id')
        ->select('appointments.id','patients.name as patient', 'medics.name as medic', 'medics.id as medic_id', 'hour', 'date')
        ->where('appointments.state', '=', 1)
        ->where(function ($q) {
            $q->where('patients.name', 'LIKE', '%' . $this->search . '%')  
              ->orwhere('medics.name', 'LIKE', '%' . $this->search . '%');
        })->orderBy($this->valor, $this->order)->paginate(8);

        
        return view('livewire.appointment-index', compact('appointments', 'patients'));
    }

    public function cambiarValor($valor){
        $this->valor = $valor;
        if ( $this->order == 'desc'){
            $this->order = 'asc';
        }
        else{
            $this->order = 'desc';
        }
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use Livewire\WithPagination;

class PatientIndex extends Component
{

    use WithPagination;
    public $search;


    public function render()
    {
        $patients = Patient::where('name', 'LIKE', '%' . $this->search . '%')->paginate(8);
        return view('livewire.patient-index', compact('patients'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

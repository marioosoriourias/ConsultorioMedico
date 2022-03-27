<?php

namespace App\Http\Livewire\Medics;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class MedicInfo extends Component
{
    use WithPagination;
    public $search;
    public $medic;

    public function render()
    {   
        $search = $this->search;        
        $appointments = $this->medic->appointments()->
        whereHas('consultation', function ($q) use ($search) {
            $q->where('id', 'LIKE', '%' . $search . '%');
        })->paginate(8);
        
        return view('livewire.medics.medic-info', compact('appointments'));
    }

    public function limpiar_page(){
        $this->reset('page');
    }
}

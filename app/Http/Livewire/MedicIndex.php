<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medic;
use Livewire\WithPagination;

use function Symfony\Component\Translation\t;

class MedicIndex extends Component
{
    use WithPagination;
    public $search;
    public $valor;
    public $order;

    public function mount(){
        $this->valor = 'name';
        $this->order = 'asc';
    }


    public function render()
    {
        $medics = Medic::where('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->valor, $this->order)->paginate(8);
        return view('livewire.medic-index', compact('medics'));
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

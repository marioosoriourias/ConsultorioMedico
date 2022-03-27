<?php

namespace App\Http\Livewire\Medics;

use App\Models\Medic;
use Livewire\Component;



class Detail extends Component
{
    public $medic;

    public function render()
    {
        $medic = $this->medic;
        return view('livewire.medics.detail', compact($medic));
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Medic;
use Illuminate\Http\Request;
use Livewire\Component;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FormularioEditarCita extends Component
{

    public $appointment;
   
    public $name, $patient_id, $medic, $medic_id;
    public $search, $search_medic;

    public $current_date, $current_hour;

    public $selected_date;

    public $hours = [];
    public $appointments_hour;  


    public function mount(Request $request)
    {
        for($i=9; $i < 19; $i++) {
            array_push($this->hours,($i < 10 ? "0":"") . $i .":00");
            array_push($this->hours,($i < 10 ? "0":"") . $i .":30");
        }

        //fecha que nos llega de la cita seleccionada
        $this->selected_date = $this->appointment->date; 
        $this->search_medic = $this->appointment->medic->name;

    }

    public function render()
    {
        $hours_occupied = [];
        $avaliable_hours = [];
        $this->selected_date = Carbon::createFromFormat('Y-m-d', $this->selected_date)->format('Y-m-d');

        
        $this->current_date = Carbon::now('America/Mazatlan')->format('Y-m-d');
       
        //Horas que ya estan ocupadas
        $this->appointments_hour = Appointment::select(DB::raw("DATE_FORMAT(hour, '%H:%i') as hour"))
        ->where('date', $this->selected_date)
        ->whereNotIn('patient_id', [$this->appointment->patient_id])->get();

        //crear array con las horas ya ocupadas
        foreach ($this->appointments_hour as $hour) {
                array_push($hours_occupied, $hour->hour);
        }

        //nos devolvera la diferencia entre los arrays
        $diference_hours  = array_diff($this->hours, $hours_occupied);
        
        
        //crearemos una array asociativo pora poder pasarselo al select de laravel collective
        foreach ($diference_hours as $hour) {
            $avaliable_hours[$hour] = $hour;
        }

        $appointment = $this->appointment;        

        return view('livewire.formulario-editar-cita', compact('avaliable_hours' ,'diference_hours', 'appointment'));
    }

    //Mostraremos los pacientes disponibles para una cita
    public function getResultsProperty()
    {   
        return Patient::where('name', 'LIKE', '%' . $this->search . '%')
        ->whereNotIn('id', function($q){
            $q->select('patient_id')
            ->from('appointments')
            ->where('state',1);
            })
        ->take(8)
        ->get();
    }    


    //Mostraremos los medicos disponibles para una cita
    public function getResultsMedicProperty()
    {   
        return Medic::where('name', 'LIKE', '%' . $this->search_medic. '%')
        ->take(8)
        ->get();
    }   

    //cuando le demos click al imput del paciente aqui guardarmos su nombre y su id
    public function patient($patient, $patient_id)
    {
        $this->search = $patient;
        $this->patient_id = $patient_id;
    }

    public function medic($medic, $medic_id)
    {
        $this->search_medic = $medic;
        $this->medic_id = $medic_id;
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medic extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    
    const H = "Hombre";
    const M = "Mujer";

    //RELACION UNO A MUCHOS
    public function appointments(){
        return $this->hasMany('App\Models\Appointment');
    }

    //RELACION hasManyThrough
    public function consultations(){
        return $this->hasManyThrough('App\Models\Consultation', 'App\Models\Appointment');
    }
}

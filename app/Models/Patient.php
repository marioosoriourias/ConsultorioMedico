<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    
    const H = "Hombre";
    const M = "Mujer";
   

    //RELACION UNO A UNO
    public function clinic(){
        return $this->hasOne('App\Models\Clinic');
    }

    //RELACION UNO A MUCHOS
    public function appointments(){
        return $this->hasMany('App\Models\Appointments');
    } 

    //RELACION hasManyThrough
    public function consultations(){
        return $this->hasManyThrough('App\Models\Consultation', 'App\Models\Appointment');
           }
       
}

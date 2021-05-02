<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    //RELACION UNO A UNO INVERSA
    public function Appointment(){
        return $this->belongsTo('App\Models\Appointment');
    }
}

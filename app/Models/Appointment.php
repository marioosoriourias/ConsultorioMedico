<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //RELACION UNO A UNO
    public function consultation(){
        return $this->hasOne('App\Models\Consultation');
    }

    //RELACION UNO A MUCHOS INVERSA
    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    public function medic(){
        return $this->belongsTo('App\Models\Medic');
    }
}

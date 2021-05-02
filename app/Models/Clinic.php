<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{

    protected $guarded = ['id'];
    use HasFactory;

    //RELACION UNO A UNO INVERSA
    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}

<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\cuadroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Medic_InfoController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\PatientController;
use App\Http\Livewire\MedicalHistoryIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->middleware('auth')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::resource('patients', PatientController::class)->middleware('auth')->names('patients');

Route::resource('medics', MedicController::class)->middleware('auth')->names('medics');


//Citas que tiene asignada cada medico
Route::get('medic_appointments/{medic}',  [Medic_InfoController::class, 'appointments'])->middleware('auth')->name('medic.appointments');

//Consultas que ha realizado cada medico
Route::get('medic_consultation/{medic}',  [Medic_InfoController::class, 'consultations'])->middleware('auth')->name('medic.consultations');

//Route::resource('clinics', ClinicController::class)->names('clinics');
Route::get('clinics/{patient}/crear',  [cuadroController::class, 'crear'])->middleware('auth')->name('clinics.crear');

Route::post('clinics/clinic',  [cuadroController::class, 'guardar'])->middleware('auth')->name('clinics.guardar');

Route::get('clinics/{patient}/editar',  [cuadroController::class, 'editar'])->middleware('auth')->name('clinics.editar');

Route::put('clinics/{clinic}/actualizar',  [cuadroController::class, 'actualizar'])->middleware('auth')->name('clinics.actualizar');



Route::resource('appointments', AppointmentController::class)->middleware('auth')->names('appointments');


Route::get('consultations', [ConsultationController::class, 'index'])->middleware('auth')->name('consultations.index');

Route::get('consultations/{appointment}/consult', [ConsultationController::class, 'consult'])->middleware('auth')->name('consultations.consult');


Route::get('medicalhistory/{patient}', MedicalHistoryIndex::class)->middleware('auth')->name('medicalhistory');



Route::post('consultations', [ConsultationController::class, 'store'])->middleware('auth')->name('consultations.store');

Route::get('consultations/{consultation}/edit',  [ConsultationController::class, 'edit'])->middleware('auth')->name('consultations.edit');

Route::put('consultations/{consultation}/update',  [ConsultationController::class, 'update'])->middleware('auth')->name('consultations.update');









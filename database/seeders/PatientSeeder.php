<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Patient;

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = Patient::factory(50)->create();
       
        foreach ($patients as $patient ) {
            Clinic::factory(1)->create(['patient_id' => $patient->id]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Medic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(MedicSeeder::class);
        $this->call(AppointmentSeeder::class);  
    }
}

<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Medic;

use Illuminate\Database\Seeder;

class MedicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medic::factory(10)->create();
       
    }
}

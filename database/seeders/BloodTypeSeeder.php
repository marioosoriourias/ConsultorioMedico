<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BloodType;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodType::create([
            'name' => 'A+'
        ]);

        BloodType::create([
            'name' => 'A-'
        ]);

        BloodType::create([
            'name' => 'B+'
        ]);

        BloodType::create([
            'name' => 'B-'
        ]);

        BloodType::create([
            'name' => 'AB+'
        ]);

        BloodType::create([
            'name' => 'AB-'
        ]);

        BloodType::create([
            'name' => 'O+'
        ]);

        BloodType::create([
            'name' => 'O-'
        ]);

    }
}

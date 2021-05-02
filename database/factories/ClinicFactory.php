<?php

namespace Database\Factories;

use App\Models\BloodType;
use App\Models\Clinic;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;


class ClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'weight'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 40, $max = 150),
           'height' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 140, $max = 200),
           'medicaments' => $this->faker->sentence(),
           'diseases' => $this->faker->sentence(),
           'blood_type_id' => $this->faker->randomElement(BloodType::all()),
        ];
    }
}

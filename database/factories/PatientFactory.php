<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phone = $this->faker->unique()->e164PhoneNumber;
        $phone = substr($phone, 1);

        return [
            'name' => $this->faker->name,
            'age'=> $this->faker->numberBetween(18, 80),
            'gender' => $this->faker->randomElement([Patient::H, Patient::M]), 
            'phone' => $phone,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
        ];
    }
}

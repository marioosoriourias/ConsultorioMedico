<?php

namespace Database\Factories;

use App\Models\Medic;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medic::class;

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
            'gender' => $this->faker->randomElement([Medic::H, Medic::M]), 
            'phone' => $phone,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+200 days', $timezone = null),
            'hour' => $this->faker->time(),
            'observations' => $this->faker->paragraph(),
            'state'=> '1',
            'patient_id' => Patient::all()->random()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Discipline;
use App\Models\Horary;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class HoraryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $teacher = Teacher::factory()->create();
        $discipline = Discipline::factory()->create();

        $hora = $this->faker->numberBetween(8,15);

        $weekday = collect([
            'Domingo',
            'Segunda-Feira',
            'Terça-Feira',
            'Quarta-Feira',
            'Quinta-Feira',
            'Sexta-Feira',
            'Sábado'
        ]);

        return [
            'discipline_id' => $discipline->id,
            'teacher_id' => $teacher->id,
            'weekday' => $weekday->random(),
            'start_time' => ($hora<10) ? '0'.$hora.':00' : $hora.':00',
            'end_time' => ($hora+2).':00',
        ];
    }
}

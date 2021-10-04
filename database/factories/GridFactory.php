<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Grid;
use Illuminate\Database\Eloquent\Factories\Factory;

class GridFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'grade '.$this->faker->word(),
            'classroom_id' => Classroom::factory()->create()->id,
        ];
    }
}

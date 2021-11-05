<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weekdays = [
            ['name' => 'Segunda-Feira'],
            ['name' => 'Terça-Feira'],
            ['name' => 'Quarta-Feira'],
            ['name' => 'Quinta-Feira'],
            ['name' => 'Sexta-Feira'],
            ['name' => 'Sábado'],
            ['name' => 'Domingo']
        ];


        Week::insert($weekdays);
    }
}

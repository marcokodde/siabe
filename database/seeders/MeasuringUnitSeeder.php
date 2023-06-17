<?php

namespace Database\Seeders;

use App\Models\MeasuringUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasuringUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MeasuringUnit::create([
            'name' => 'Porcentaje',
            'sign' => '%',
            'plural_name' => 'Porcentaje',
            'active' => true,
        ]);
        MeasuringUnit::create([
            'name' => 'Millones de pesos',
            'sign' => 'Millones de pesos',
            'plural_name' => 'Millones de pesos',
            'active' => true,
        ]);
        MeasuringUnit::create([
            'name' => 'Índice',
            'sign' => 'Índice',
            'plural_name' => 'Índice',
            'active' => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Benefit::create(
            ['name' => 'Despensa',],
        );
        Benefit::create(
            ['name' => 'Calzado',],
        );
        Benefit::create(
            ['name' => 'Ropa',],
        );
        Benefit::create(
            ['name' => 'Útiles escolares',],
        );
        Benefit::create(
            ['name' => 'Material de construcción',],
        );
        Benefit::create(
            ['name' => 'Uniformes',],
        );
        Benefit::create(
            ['name' => 'Medicina',],
        );
        Benefit::create(
            ['name' => 'Otros',],
        );
        Benefit::create(
            ['name' => 'Ahorro para ...',],
        );
        Benefit::create(
            ['name' => 'Ahorro bimensual',],
        );
        Benefit::create(
            ['name' => 'Recreación',],
        );
        Benefit::create(
            ['name' => 'Convivio',],
        );
        Benefit::create(
            ['name' => 'Comisión por uso de tarjeta',],
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\CategoryKpi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryKpiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryKpi::create([
            'name' => '% Recupero – Cartera Total (RT) | Por Producto (RTP)',
            'field_name' => 'porcentaje_recupero'
        ]);
        CategoryKpi::create([
            'name' => '% Crecimiento de Pagos (CP)',
            'field_name' => 'crecimiento_pagos'
        ]);
        CategoryKpi::create([
            'name' => '% Rescate (REC) – por Buckets: 0-30 | 31-60 | 61-90 | 91-180 | over 180',
            'field_name' => 'rescate'
        ]);
        CategoryKpi::create([
            'name' => '% Contención (CON) – por Buckets: 0-30 | 31-60 | 61-90 | 91-180 | over 180',
            'field_name' => 'contencion'
        ]);
        CategoryKpi::create([
            'name' => '% Current (CR)',
            'field_name' => 'current'
        ]);
        CategoryKpi::create([
            'name' => 'Índice de Rotación (IR)',
            'field_name' => 'rotacion'
        ]);
    }
}

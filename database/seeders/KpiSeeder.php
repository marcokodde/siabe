<?php

namespace Database\Seeders;

use App\Models\CategoryKpi;
use App\Models\Kpi;
use App\Models\MeasuringUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KpiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = CategoryKpi::where(['field_name' => 'porcentaje_recupero'])->first();
        Kpi::create([
            'name' => 'Porcentaje total de Recupero',
            'field_name' => 'porcentaje_total_recupero',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Porcentaje de Recupero Tarjeta',
            'field_name' => 'porcentaje_recupero_tarjeta',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Porcentaje de Recupero Préstamo',
            'field_name' => 'porcentaje_recupero_prestamo',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Porcentaje de Recupero PYME',
            'field_name' => 'porcentaje_recupero_pyme',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);

        $category = CategoryKpi::where(['field_name' => 'crecimiento_pagos'])->first();
        Kpi::create([
            'name' => '% Crecimiento total de Pagos',
            'field_name' => 'crecimiento_total',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => '% Crecimiento de Pagos a Tarjeta',
            'field_name' => 'crecimiento_pago_tarjeta',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => '% Crecimiento de Pagos Préstamo',
            'field_name' => 'crecimiento_pago_prestamo',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => '% Crecimiento de Pagos Pyme',
            'field_name' => 'crecimiento_pago_pyme',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);

        $category = CategoryKpi::where(['field_name' => 'rescate'])->first();
        Kpi::create([
            'name' => 'Rescate promedio Mora 1 (0 a 30)',
            'field_name' => 'rescate-mora-1',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Rescate promedio Mora 2 (31 a 60)',
            'field_name' => 'rescate-mora-2',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Rescate promedio Mora 3 (61 a 90)',
            'field_name' => 'rescate-mora-3',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Rescate promedio Mora 4 (91 a 180)',
            'field_name' => 'rescate-mora-4',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Rescate promedio Mora 5 (Over 180)',
            'field_name' => 'rescate-mora-5',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);

        $category = CategoryKpi::where(['field_name' => 'contencion'])->first();
        Kpi::create([
            'name' => 'Contención promedio Mora 1 (0 a 30)',
            'field_name' => 'contencion-mora-1',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Contención promedio Mora 2 (31 a 60)',
            'field_name' => 'contencion-mora-2',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Contención promedio Mora 3 (61 a 90)',
            'field_name' => 'contencion-mora-3',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Contención promedio Mora 4 (91 a 180)',
            'field_name' => 'contencion-mora-4',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);
        Kpi::create([
            'name' => 'Contención promedio Mora 5 (Over 180)',
            'field_name' => 'contencion-mora-5',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);

        $category = CategoryKpi::where(['field_name' => 'current'])->first();
        Kpi::create([
            'name' => '% de Cartera al corriente',
            'field_name' => 'cartera-corriente',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);

        $category = CategoryKpi::where(['field_name' => 'rotacion'])->first();
        Kpi::create([
            'name' => '% de rotación de personal mensual',
            'field_name' => 'rotacion-personal',
            'active' => 1,
            'category_kpi_id' => $category->id,
        ]);

        /**
         * Termometro
         */
        $porcentaje_unit = MeasuringUnit::where(['name' => 'Porcentaje'])->first();
        $millones_unit = MeasuringUnit::where(['name' => 'Millones de pesos'])->first();
        $indice_unit = MeasuringUnit::where(['name' => 'Índice'])->first();

        $category = CategoryKpi::create([
            'name' => 'Cartera de Crédito',
            'field_name' => 'credit',
            'type' => 2,
        ]);
        Kpi::create([
            'name' => 'Activos Totales',
            'field_name' => 'activos-totales',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Total de Crédito',
            'field_name' => 'cartera-total-credito',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Total de Crédito sobre Activos Totales',
            'field_name' => 'cartera-total-credito-activos-totales',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $porcentaje_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Total Créditos Consumo',
            'field_name' => 'cartera-total-credito-consumo',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Tarjeta de Crédito',
            'field_name' => 'cartera-tarjeta-credito',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Consumo no Revolvente',
            'field_name' => 'cartera-no-revolvente',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Automotriz',
            'field_name' => 'cartera-auto',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Personales',
            'field_name' => 'cartera-personal',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Nómina',
            'field_name' => 'cartera-nomina',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);
        Kpi::create([
            'name' => 'Cartera Total Créditos a la Vivienda',
            'field_name' => 'cartera-total-vivienda',
            'active' => 1,
            'category_kpi_id' => $category->id,
            'measuring_unit_id' => $millones_unit->id,
        ]);

        $category = CategoryKpi::create([
            'name' => 'IMOR',
            'field_name' => 'imor',
            'type' => 2,
        ]);
        Kpi::create(['name' => 'IMOR Cartera Total (Índice de Morosidad)', 'active' => 1, 'field_name' => 'imor-total', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Comerciales', 'active' => 1, 'field_name' => 'imor-comercial', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Actividad Empresarial', 'active' => 1, 'field_name' => 'imor-empresarial', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Entidades Financieras', 'active' => 1, 'field_name' => 'imor-financieras', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Entidades Gubernamentales', 'active' => 1, 'field_name' => 'imor-gob', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos de Consumo Totales', 'active' => 1, 'field_name' => 'imor-consumo', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Tarjetas de Crédito', 'active' => 1, 'field_name' => 'imor-tarjeta-credito', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos de Consumo No Revolventes', 'active' => 1, 'field_name' => 'imor-consumo-no-revolvente', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Personales', 'active' => 1, 'field_name' => 'imor-personal', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Nómina', 'active' => 1, 'field_name' => 'imor-nomina', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos Automotrices', 'active' => 1, 'field_name' => 'imor-auto', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        Kpi::create(['name' => 'IMOR Créditos a la Vivienda', 'active' => 1, 'field_name' => 'imor-vivienda',  'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id ]);
        $category = CategoryKpi::create([
            'name' => 'Reservas Crediticias',
            'field_name' => 'reservas-crediticias',
            'type' => 2,
        ]);
        Kpi::create(['name' => 'ICOR Cartera Total   (Índice de Cobertura)', 'field_name' => 'icor-Total', 'active' => 1, 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Comerciales', 'active' => 1, 'field_name' => 'icor-Comerciales', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Actividad Empresarial', 'active' => 1, 'field_name' => 'icor-Empresarial', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Entidades Financieras', 'active' => 1, 'field_name' => 'icor-Financieras', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Entidades Gubernamentales', 'active' => 1, 'field_name' => 'icor-Gubernamentales',  'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos de Consumo Totales', 'active' => 1, 'field_name' => 'icor-Totales', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Tarjetas de Crédito', 'active' => 1, 'field_name' => 'icor-credito',  'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos de Consumo No Revolventes', 'active' => 1, 'field_name' => 'icor-no-Revolventes', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Personales', 'active' => 1, 'field_name' => 'icor-Personales', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Nómina', 'active' => 1, 'field_name' => 'icor-nomina', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos Automotrices', 'active' => 1, 'field_name' => 'icor-Automotrices', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'ICOR Créditos a la Vivienda', 'active' => 1, 'field_name' => 'icor-Vivienda', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $indice_unit->id]);
        Kpi::create(['name' => 'TOTAL Reservas Crediticias', 'active' => 1, 'field_name' => 'icor-reservas', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $millones_unit->id]);
        Kpi::create(['name' => 'TOTAL Reservas sobre Cartera Total de Crédito', 'active' => 1, 'field_name' => 'icor-reservas-total', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);

        $category = CategoryKpi::create([
            'name' => 'Pérdida Esperada',
            'field_name' => 'perdida-esperada',
            'type' => 2,
        ]);
        Kpi::create(['name' => 'Pérdida Esperada Cartera Total', 'active' => 1, 'field_name' => 'perdida-esperada-total', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Comerciales', 'active' => 1,'field_name' => 'perdida-esperada-Comerciales', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Actividad Empresarial', 'active' => 1, 'field_name' => 'perdida-esperada-Empresarial','category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Entidades Financieras', 'active' => 1, 'field_name' => 'perdida-esperada-Financieras','category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Entidades Gubernamentales', 'active' => 1, 'field_name' => 'perdida-esperada-Gubernamentales','category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos de Consumo Totales', 'active' => 1, 'field_name' => 'perdida-esperada-Consumo','category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Tarjetas de Crédito', 'active' => 1,'field_name' => 'perdida-esperada-Credito', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos de Consumo No Revolventes','field_name' => 'perdida-esperada-Consumo-No-Revolventes', 'active' => 1, 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Personales', 'active' => 1,'field_name' => 'perdida-esperada-Personales',  'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Nómina', 'active' => 1, 'field_name' => 'perdida-esperada-nomina', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos Automotrices', 'active' => 1,'field_name' => 'perdida-esperada-Automotrices', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'Pérdida Esperada Créditos a la Vivienda', 'active' => 1,'field_name' => 'perdida-esperada-Vivienda','category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        $category = CategoryKpi::create([
            'name' => 'Rentabilidad',
            'field_name' => 'rentabilidad',
            'type' => 2,
        ]);
        Kpi::create(['name' => 'ROA (Rendimiento sobre los Activos)', 'active' => 1,'field_name' => 'ROA', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);
        Kpi::create(['name' => 'ROE (Rendimiento sobre Capital Contable)', 'active' => 1,'field_name' => 'ROE', 'category_kpi_id' => $category->id, 'measuring_unit_id' => $porcentaje_unit->id]);

        // Kpi::create([ 'name' => '', 'active' => 1, 'category_kpi_id' => $category->id, ]);
        // Kpi::create([ 'name' => '', 'active' => 1, 'category_kpi_id' => $category->id, ]);
        // Kpi::create([
        //     'name' => '',
        //     // 'field_name' => 'cartera-total-credito-activos-totales',
        //     'active' => 1,
        //     'category_kpi_id' => $category->id,
        // ]);
    }
}

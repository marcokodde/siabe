<?php

namespace Database\Seeders;

use App\Models\Subproject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubprojectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subprojects = array(
            'AN',
            'AV',
            'CBT',
            'CBT-X',
            'CE',
            'CO',
            'COC',
            'CPC',
            'CPI',
            'CTA',
            'CTP',
            'EPA',
            'IJP-X',
            'JCH',
            'JEF',
            'JI',
            'JPE',
            'LE',
            'LM',
            'MMM',
            'MST',
            'OIC',
            'OIC-X',
            'OSC',
            'RSO',
            'SC',
            'SAC',
            'SM',
            'TLA',
            'TMH',
            'TPA',
            'TTC',
            'WIN',
        );

        foreach ($subprojects as $key => $subproject) {
            Subproject::create([
                'name' => $subproject,
                'description' => $subproject,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Period::create([
            'date' => '2022-08-01',
            'active' => 1
        ]);
        Period::create([
            'date' => '2022-09-01',
            'active' => 1
        ]);
        Period::create([
            'date' => '2022-10-01',
            'active' => 1
        ]);
        Period::create([
            'date' => '2022-11-01',
            'active' => 1
        ]);
        Period::create([
            'date' => '2022-12-01',
            'name' => 'Dic/22',
            'type' => 1,
            'active' => 1
        ]);
        Period::create([
            'date' => '2023-01-01',
            'name' => 'Ene/23',
            'type' => 1,
            'active' => 1
        ]);
        Period::create([
            'date' => '2023-02-01',
            'name' => 'Feb/23',
            'type' => 1,
            'active' => 1
        ]);

        /**
         * 
         */
        Period::create([
            'date' => '2017-12-31',
            'name' => 'Dic/17',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2018-12-31',
            'name' => 'Dic/18',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2019-12-31',
            'name' => 'Dic/19',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2020-12-31',
            'name' => 'Dic/20',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2021-12-31',
            'name' => 'Dic/21',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2022-12-31',
            'name' => 'Dic/22',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2023-01-01',
            'name' => 'Ene/23',
            'type' => 2,
            'active' => 1
        ]);
        Period::create([
            'date' => '2023-02-01',
            'name' => 'Feb/23',
            'type' => 2,
            'active' => 1
        ]);
    }
}

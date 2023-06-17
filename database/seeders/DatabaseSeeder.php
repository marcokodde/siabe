<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Benefit;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            // BenefitSeeder::class,
            // SubprojectSeeder::class,
            // GenderSeeder::class,
            // ChildTypeSeeder::class,
            MeasuringUnitSeeder::class,
            CategoryKpiSeeder::class,
            KpiSeeder::class,
            PeriodSeeder::class,
            PeriodKpiSeeder::class,
        ]);
    }
}

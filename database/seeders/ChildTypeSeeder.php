<?php

namespace Database\Seeders;

use App\Models\ChildType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ChildType::create([
            'name' => 'Niño'
        ]);
        ChildType::create([
            'name' => 'Joven'
        ]);
        ChildType::create([
            'name' => 'Anciano'
        ]);
    }
}

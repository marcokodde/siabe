<?php

namespace App\Console\Commands;

use App\Models\Migration\SolidarityGroupMigrate;
use App\Models\SolidarityGroup;
use App\Models\Subproject;
use Illuminate\Console\Command;

class SolidarityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:solidarity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migración de grupos solidarios';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $solidarity = SolidarityGroupMigrate::get();
        
        foreach ($solidarity as $flight) {
            $subproject = Subproject::where(['name' => $flight->SubProject])->first();
            if($subproject) {
                $s = SolidarityGroup::where(['name' => $flight->Name, 'subproject_id' => $subproject->id,])->first();
                if(!$s) {
                    SolidarityGroup::create([
                        'name' => $flight->Name,
                        'description' => $flight->Name,
                        'subproject_id' => $subproject->id,
                    ]);
                }
            } else {
                $this->error('no se ha encontrado el subproyecto: ' . $flight->SubProject);
            }
        }
        $this->info('The command was successful!');
        return Command::SUCCESS;
    }
}

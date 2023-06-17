<?php

namespace App\Console\Commands;

use App\Models\Migration\SolidarityGroupMigrate;
use App\Models\SolidarityGroup;
use App\Models\Subproject;
use Illuminate\Console\Command;

class DataMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data Migration';

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
                // break;
            }
            // echo $flight->Name . "\n\r";
        }
        $this->info('The command was successful!');
        return Command::SUCCESS;
    }
}

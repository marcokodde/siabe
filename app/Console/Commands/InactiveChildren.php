<?php

namespace App\Console\Commands;

use App\Models\Child;
use App\Models\Migration\Counts;
use Illuminate\Console\Command;

class InactiveChildren extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:inactive-children';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desactiva los beneficiarios';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counts = Counts::get();
        $array = [];
        foreach ($counts as $key => $count) {
            $array[] = $count->ChildID;
        }
        Child::whereNotIn('child_id', $array)->delete();
        
        $this->info('command run succesfully');
        return Command::SUCCESS;
    }
}

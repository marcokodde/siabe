<?php

namespace App\Console\Commands;

use App\Models\Child;
use App\Models\ChildType;
use App\Models\Gender;
use App\Models\Migration\ChildMigrate;
use App\Models\Subproject;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChildMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:child';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migración de beneficiarios';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $childs = ChildMigrate::get();
        foreach ($childs as $key => $_child) {
            # code...
            $subproject = Subproject::where(['name' => $_child->SubProject])->first();
            if($subproject) {

            } else {
                $this->comment('El subproyecto no existe: ' . $_child->SubProject . '. Se crea el Subproyecto');
                $subproject = Subproject::create([
                    'name' => $_child->SubProject,
                    'description' => $_child->SubProject,
                ]);
                // return Command::FAILURE;
            }
            $age = Carbon::parse($_child->BirthDate)->age;
            $gender = null;
            if ($_child->Gender == "Male") {
                $gender = Gender::where([ 'name' =>  'Masculino' ])->first()->id;
            } else if ($_child->Gender == "Female") {
                $gender = Gender::where([ 'name' =>  'Femenino' ])->first()->id;
            }

            $type = null;
            if($_child->PrimaryChildType == "Child" && $age >= 13){
                $type = ChildType::where(['name' => 'Joven'])->first()->id;
            }
            else if($_child->PrimaryChildType == "Child" && $age < 13){
                $type = ChildType::where(['name' => 'Niño'])->first()->id;
            }
            else {
                $type = ChildType::where(['name' => 'Anciano'])->first()->id;
            }
            // $this->info('Se completo exitosamente');
            // return Command::SUCCESS;
            Child::create([
                'child_id' => $_child->ChildID,
                'top_level_project' => $_child->TopLevelProject,
                'parent_project' => $_child->ParentProject,
                'primary_child_type' => $_child->PrimaryChildType,
                'disbursement_child_type' => $_child->DisbursementChildType,
                'firstname' => $_child->FirstName,
                'goesby' => $_child->GoesBy,
                'middlename' => $_child->MiddleName,
                'surname' => $_child->Surname,
                'search_fullname' => $_child->SearchFullName,
                'fullname' => $_child->FullName,
                'birthdate' => $_child->BirthDate,
                'gender' => $_child->Gender,
                'last_letter_date' => $_child->LastLetterDate,
                'child_status' => $_child->ChildStatus,
                'status_change_reason' => $_child->StatusChangeReason,
                'initial_sponsorship_date' => $_child->InitialSponsorshipDate,
                'last_photo_received_date' => $_child->LastPhotoReceivedDate,
                'last_photo_requested_date' => $_child->LastPhotoRequestedDate,
                'last_photo_response_date' => $_child->LastPhotoResponseDate,
                'last_modified_on' => $_child->LastModifiedOn,
                'status_set_on' => $_child->StatusSetOn,
                'associate_id' => $_child->AssociateID,
                'welcome_notification_date' => $_child->WelcomeNotificationDate,
                'begin_date' => $_child->BeginDate,
                'status_change_reason_spanish' => $_child->StatusChangeReasonSpanish,
                'next_photo_due_date' => $_child->NextPhotoDueDate,
                'gender_id' => $gender,
                'child_type_id' => $type,
                'subproject_id' => $subproject->id,
            ]);
        }
        
        $this->info('Se completo exitosamente');
        return Command::SUCCESS;
    }
}

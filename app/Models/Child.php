<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    // HasUuids
    use HasFactory, SoftDeletes, HasUuids;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'child_id',
        'top_level_project',
        'parent_project',
        'primary_child_type',
        'disbursement_child_type',
        'firstname',
        'goesby',
        'middlename',
        'surname',
        'search_fullname',
        'fullname',
        'birthdate',
        'gender',
        'last_letter_date',
        'child_status',
        'status_change_reason',
        'initial_sponsorship_date',
        'last_photo_received_date',
        'last_photo_requested_date',
        'last_photo_response_date',
        'last_modified_on',
        'status_set_on',
        'associate_id',
        'welcome_notification_date',
        'begin_date',
        'status_change_reason_spanish',
        'next_photo_due_date',
        'gender_id',
        'child_type_id',
        'subproject_id',
    ];

    // protected $keyType = 'string';

    public function child_gender()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }
    public function subproject()
    {
        return $this->hasOne(Subproject::class, 'id', 'subproject_id');
    }
    public function child_type()
    {
        return $this->hasOne(ChildType::class, 'id', 'child_type_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'date',
        'name',
        'active',
    ];

    public function period_user()
    {
        return $this->hasOne(PeriodUser::class, 'period_id', 'id');
    }
}

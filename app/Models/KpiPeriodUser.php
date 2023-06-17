<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KpiPeriodUser extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'period_user_id',
        'kpi_id',
        'value',
        'active',
    ];

    public function period()
    {
        return $this->hasOne(Period::class);
    }

    public function kpi()
    {
        return $this->hasOne(Kpi::class, 'id', 'kpi_id');
    }
}
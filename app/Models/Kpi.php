<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kpi extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    // protected $primaryKey = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'field_name',
        'active',
        'category_kpi_id',
    ];
    public function periods()
    {
        return $this->hasMany(Period::class, 'id', 'period_id');
    }
    public function category_kpi()
    {
        return $this->hasOne(CategoryKpi::class, 'id', 'category_kpi_id');
    }
    public function measuring_unit()
    {
        return $this->hasOne(MeasuringUnit::class, 'id', 'measuring_unit_id');
    }
}

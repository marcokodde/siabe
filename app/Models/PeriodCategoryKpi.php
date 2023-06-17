<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodCategoryKpi extends Model
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'period_id',
        'category_kpi_id',
    ];

    public function category_kpi()
    {
        return $this->hasOne(CategoryKpi::class, 'id', 'category_kpi_id');
    }
}

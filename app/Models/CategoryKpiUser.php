<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryKpiUser extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'status',
        'active',
        'period_category_kpi_id',
        'user_id',
    ];
}

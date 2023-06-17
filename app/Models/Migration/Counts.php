<?php

namespace App\Models\Migration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counts extends Model
{
    use HasFactory;
    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql-migrate';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ChildID';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'counts';
}

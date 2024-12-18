<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCreator extends Model
{
    protected $table = 'activity_creator';

    protected $primaryKey = 'act_id';

    public $timestamps = false;

    protected $fillable = [
        'act_id',
        'u_id',
    ];
}

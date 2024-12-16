<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCreator extends Model
{
    protected $table = 'activity_creator';

    public $timestamps = false;

    protected $fillable = [
        'act_id',
        'u_id',
    ];
}

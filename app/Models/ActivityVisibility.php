<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityVisibility extends Model
{
    protected $table = 'act_visibility';

    protected $primaryKey = 'act_id';

    public $timestamps = false;

    protected $fillable = [
        'act_id',
        'g_id',
    ];
}

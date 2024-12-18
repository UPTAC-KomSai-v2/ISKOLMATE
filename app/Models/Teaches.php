<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teaches extends Model
{
    protected $table = 'teaches';

    protected $primaryKey = 'g_id';

    public $timestamps = false;

    protected $fillable = [
        'u_id',
        'ins_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false; 

    protected $primaryKey = 'group_id';

    protected $fillable = [
        'group_name'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityCreator;

class Activity extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'description',
        'deadline',
    ];

    public function get_owner_id()
    {
        return ActivityCreator::find($this->id)->u_id;
    }
}

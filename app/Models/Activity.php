<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return DB::select("SELECT u_id FROM activity_creator WHERE g_id = ?", [ $this->id ])[0]->u_id;
    }
}

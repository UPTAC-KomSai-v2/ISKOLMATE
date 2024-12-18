<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    public $timestamps = false; 

    protected $primaryKey = 'group_id';

    protected $fillable = [
        'group_name'
    ];

    public function get_owner_id()
    {
        return DB::select("SELECT ins_id FROM teaches WHERE g_id = ?", [ $this->group_id ])[0]->ins_id;
    }
}

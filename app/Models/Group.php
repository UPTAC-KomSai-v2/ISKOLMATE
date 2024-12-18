<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Teaches;

class Group extends Model
{
    public $timestamps = false; 

    protected $primaryKey = 'group_id';

    protected $fillable = [
        'group_name'
    ];

    public function get_owner_id()
    {
        return $this->get_teaches()->ins_id;
    }

    public function get_teaches()
    {
        return Teaches::find($this->group_id);
    }
}

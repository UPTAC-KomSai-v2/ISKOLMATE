<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text',];
    public $timestamps = false;

    public function creators()
    {
        return $this->hasMany(AnnouncementCreator::class, 'announcement_id');
    }

    public function get_owner_id()
    {
        return DB::select("SELECT u_id FROM announcement_creator WHERE annc_id = ?", [ $this->id ])[0]->u_id;
    }
}

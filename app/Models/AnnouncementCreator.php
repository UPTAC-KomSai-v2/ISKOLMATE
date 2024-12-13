<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementCreator extends Model
{
    use HasFactory;

    protected $table = 'announcement_creator';
    protected $fillable = ['annc_id', 'u_id'];
    public $timestamps = false;

    // Relationship User Model
    public function user(){
        return $this->belongsTo(User::class, 'u_id');
    }
    // Relationship Announcement Model
    public function announcement(){
        return $this->belongsTo(Announcement::class, 'annc_id');
    }

}

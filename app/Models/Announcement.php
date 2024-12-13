<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text',];

    public function creators()
    {
        return $this->hasMany(AnnouncementCreator::class, 'announcement_id');
    }
}

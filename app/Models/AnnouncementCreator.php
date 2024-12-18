<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementCreator extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'annc_id';

    protected $table = 'announcement_creator';

    protected $fillable = [
        'annc_id',
        'u_id'
    ];
}

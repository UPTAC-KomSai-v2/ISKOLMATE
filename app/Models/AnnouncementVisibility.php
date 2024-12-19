<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncementVisibility extends Model
{
    protected $table = 'annc_visibility';

    protected $primaryKey = 'annc_id';

    public $timestamps = false;

    protected $fillable = [
        'annc_id',
        'g_id',
    ];
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'availabilities';
    protected $primaryKey = 'av_id';

    protected $fillable = [
        'user_id',
        'time_start',
        'time_end',
        'availability_date',
    ];
}

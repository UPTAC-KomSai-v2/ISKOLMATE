<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'availability';
    protected $primaryKey = 'av_id';

    protected $fillable = [
        'user_id',
        'time_start',
        'time_end',
        'date',
    ];
}

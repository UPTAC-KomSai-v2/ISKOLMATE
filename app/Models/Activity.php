<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityCreator;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'description',
        'deadline',
    ];

    public function get_owner_id()
    {
        return ActivityCreator::find($this->id)->u_id;
    }
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'act_visibility', 'act_id', 'g_id');
    }
}

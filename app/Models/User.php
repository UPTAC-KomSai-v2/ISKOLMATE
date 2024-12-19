<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    /* we set timestamps to false so that Eloquent does not expect a created_at and updated_at column*/
    public $timestamps = false; 


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Specifies whether the User is a teacher or not
     * 
     * @return bool
     */
    public function is_teacher(): bool
    {
        return $this->role == 'Teacher';
    }

    /**
     * Returns the user groups/courses.
     *
     * @var Collection
     */
    public function get_courses(): Collection
    {
        $user_groups = DB::select('select * from user_group where u_id = ?', [ $this->id ]);
        $user_owned_groups = DB::select('select * from teaches where ins_id = ?', [ $this->id ]);

        $user_group_ids = array_column($user_groups, 'g_id');
        $user_owned_groups = array_column($user_owned_groups, 'g_id');

        $group_ids = array_unique(array_merge($user_group_ids, $user_owned_groups));

        return Group::whereIn('group_id', $group_ids)
            ->whereNotIn('group_id', [1, 2])
            ->get();
    }

    /**
     * Returns all the user groups/courses.
     *
     * @var Collection
     */
    public function get_all_courses(): Collection
    {
        $user_groups = DB::select('select * from user_group where u_id = ?', [ $this->id ]);
        $user_owned_groups = DB::select('select * from teaches where ins_id = ?', [ $this->id ]);

        $user_group_ids = array_column($user_groups, 'g_id');
        $user_owned_groups = array_column($user_owned_groups, 'g_id');

        $group_ids = array_unique(array_merge($user_group_ids, $user_owned_groups));

        return Group::whereIn('group_id', $group_ids)->get();
    }

    public function in_course($course_id): bool
    {
        foreach ($this->get_all_courses() as $course) {
            if ($course->group_id == $course_id) {
                return true;
            }
        }

        return false;
    }
}

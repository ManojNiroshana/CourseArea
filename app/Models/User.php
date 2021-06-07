<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'user_name',
        'password',
        'u_tp_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function checkUserEnrolledPreviously($u_id, $course_id)
    {
        if (Auth::user()->u_tp_id == 2) {
            $course_registry =  CourseRegistry::where('u_id', $u_id)->where('course_id', $course_id)->first();
            return $course_registry ? true : false;
        }
    }
    public static function checkUserPoints()
    {
        if (Auth::user()->u_tp_id == 2) {
            $course_points =  CourseRegistry::where('u_id', Auth::user()->id)->count();
            return $course_points;
        }
    }
}

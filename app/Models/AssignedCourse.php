<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignedCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'assigned_courses';

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'assigned_id';

    protected $fillable = [
        'u_id',
        'course_id',
    ];
}

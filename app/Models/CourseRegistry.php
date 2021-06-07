<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseRegistry extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'course_registries';

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'registry_id';

    protected $fillable = [
        'u_id',
        'course_id',
    ];
}

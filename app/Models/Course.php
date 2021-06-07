<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'courses';

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
    ];
}

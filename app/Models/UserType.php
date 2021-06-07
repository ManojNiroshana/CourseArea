<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_types';

    protected $revisionCreationsEnabled = true;

    protected $primaryKey = 'u_tp_id';

    protected $fillable = [
        'user_type_code',
        'user_type_name',
    ];
}

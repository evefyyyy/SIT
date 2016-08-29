<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStudent extends Model
{
    protected $table = 'project_students';
    protected $fillable =
    [
      'project_pkid',
      'student_pkid'
    ];
}

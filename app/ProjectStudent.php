<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStudent extends Model
{
    protected $table = 'project_students';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject', 'project_pkid');
    }

    public function student()
    {
      return $this->belongsTo('App\Student', 'student_pkid');
    }

    public function advisor()
    {
      return $this->belongsTo('App\Advisor');
    }

}

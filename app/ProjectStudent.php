<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStudent extends Model
{
    protected $table = 'project_students';
    protected $fillable = [
      'project_pkid',
      'student_pkid'
    ];

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject');
    }

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function advisor()
    {
      return $this->belongsTo('App\Advisor');
    }

}

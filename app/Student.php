<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'students';

    protected $fillable =
    [
      'project_pkid',
      'student_pkid'
    ];

    public function projectStudents(){
    	return $this->hasMany('App\ProjectStudent', 'student_pkid');
    }
}

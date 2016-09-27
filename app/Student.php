<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'students';
    
    public function projectStudent(){
    	return $this->hasMany('App\ProjectStudent', 'student_pkid');
    }
}

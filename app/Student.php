<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'students';
    protected $fillable = [
      'student_id',
      'student_fname',
      'student_lname',
      'student_email'
    ];
}

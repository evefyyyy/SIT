<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'Student';
    protected $fillable = [
      'idStudent',
      'Student_fname',
      'Student_lname',
      'Student_email',
      'User_type_idUser_type'
    ];
}

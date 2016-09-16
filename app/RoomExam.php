<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomExam extends Model
{
    protected $table = 'rooms_exam';

    protected $fillable =
    [
      'exam_datetime',
      'exam_starttime',
      'exam_endtime',
      'project_pkid',
      'room_id'
    ];

    public function roomAdvisor()
    {
      return $this->hasMany('App\RoomExam','room_exam_id');
    }
}

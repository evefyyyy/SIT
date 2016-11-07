<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomExam extends Model
{
    protected $table = 'rooms_exam';

    public function sitrooms(){
      return $this->belongsTo('App\Room', 'room_id');
    }

    public function projectExam(){
      return $this->belongsTo('App\ProjectStudent', 'project_pkid');
    }
}

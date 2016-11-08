<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    public function roomExam(){
      return $this->hasMany('App\RoomExam');
    }
}

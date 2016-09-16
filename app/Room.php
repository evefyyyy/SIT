<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable =
    [
      'room_floor',
      'room_tower',
      'room_name'
    ];

    public function roomExam(){
      return $this->hasMany('App\RoomExam','room_id');
    }
}

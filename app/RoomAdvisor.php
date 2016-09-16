<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomAdvisor extends Model
{
  protected $table = 'rooms_advisor';

  public function advisor()
  {
    return $this->belongsTo('App\Advisor', 'advisor_id');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dday extends Model
{
    //
    protected $table = 'dday';
    public function ddayProject()
    {
      return $this->hasOne('App\DdayProject' , 'dday_id');
  }
}

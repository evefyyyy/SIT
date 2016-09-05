<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dday extends Model
{
    //
    protected $table = 'dday';
    public function ddayProject()
    {
      return $this->hasMany('App\DdayProject' , 'dday_id');
  }
}

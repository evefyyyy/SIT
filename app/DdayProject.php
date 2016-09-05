<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DdayProject extends Model
{
    //
    protected $table = 'dday_project';

    public function dday()
    {
      return $this->belongsTo('App\DdayProject');
    }
    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject');
    }
}

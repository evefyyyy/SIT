<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject', 'project_pkid');
    }
  
}

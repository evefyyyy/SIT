<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreTest extends Model
{
    protected $table = 'score_tests';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject' ,'project_pkid');
    }
}

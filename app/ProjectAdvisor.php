<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAdvisor extends Model
{


    protected $table = 'project_advisors';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject', 'project_pkid');
    }

    public function advisor()
    {
      return $this->belongsTo('App\Advisor', 'advisor_id');
    }
}

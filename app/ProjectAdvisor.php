<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAdvisor extends Model
{
<<<<<<< HEAD

    protected $table = 'project_advisors';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject', 'project_pkid');
    }

    public function advisor()
    {
      return $this->belongsTo('App\Advisor', 'advisor_id');
    }
=======
    protected $table = 'project_advisors';
    protected $fillable =
    [
      'project_pkid',
      'advisor_id',
      'advisor_position_id'
    ];
>>>>>>> f8613601bf24d7f7ff93a0dec98d31815388ce88
}

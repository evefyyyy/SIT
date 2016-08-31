<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProject extends Model
{
    protected $table = 'group_projects';
    //hello

    public function category()
    {
      return $this->belongsTo('App\Category');
    }
    public function type(){
      return $this->belongsTo('App\Type');
    }

    public function projectStudents()
    {
      return $this->hasMany('App\ProjectStudent', 'project_pkid');
    }

    public function projectAdvisors()
    {
      return $this->hasMany('App\ProjectAdvisor', 'project_pkid');
    }
    public function projectProposal()
    {
      return $this->hasMany('App\ProjectProposal', 'project_pkid');
    }
}

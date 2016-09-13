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
    public function proposal()
    {
      return $this->hasMany('App\Proposal', 'project_pkid');
    }
    public function ddayProject()
    {
      return $this->hasMany('App\DdayProject', 'project_pkid');
    }
    public function proposalSourceCode()
    {
      return $this->hasMany('App\ProposalSourceCode', 'project_pkid');
    }
    public function picture()
    {
      return $this->hasMany('App\Picture','project_pkid');
    }
    public function projectDetail()
    {
      return $this->hasMany('App\ProjectDetail','project_pkid');
    }
}

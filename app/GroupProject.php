<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProject extends Model
{
    protected $table = 'group_projects';
    protected $fillable =
    [
      'id',
      'group_project_ENG_name',
      'group_project_TH_name',
      'group_project_detail',
      'group_project_short_detail',
      'group_project_recommand',
      'group_project_approve'
    ];
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
}

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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $table = 'projects_detail';
    protected $fillable =
    [
      'group_project_detail',
      'tools_detail',
      'project_pkid'
    ];
}

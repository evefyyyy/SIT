<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectAdvisor extends Model
{
    protected $table = 'project_advisors';
    protected $fillable =
    [
      'project_pkid',
      'advisor_id',
      'advisor_position_id'
    ];
}

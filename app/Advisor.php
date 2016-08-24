<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adivor extends Model
{
  protected $table = 'Group_project_has_Advisor';
  protected $fillable =
  [
    'idGroup_project',
    'Advisor_idAdvisor',
    'Advisor_type_idAdvisor_type',
    'Advisor_position_idAdvisor_position'
  ];
}

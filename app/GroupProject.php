<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProject extends Model
{
    protected $table = 'Group_project';
    protected $fillable =
    [
      'idGroup_project',
      'Group_project_ENG_name',
      'Group_project_TH_name',
      'Group_project_detail',
      'Group_project_short_detail',
      'Group_project_recommand',
      'Group_project_approve',
      'Category_idCategory',
      'Type_idType',
      'Proposol_idProposol'
    ];
}

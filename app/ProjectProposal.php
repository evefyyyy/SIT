<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectProposal extends Model
{
    protected $table = 'project_proposals';
    protected $fillable =
    [
      'project_pkid',
      'proposal_id'
    ];
}

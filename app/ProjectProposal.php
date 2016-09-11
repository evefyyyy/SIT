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
    public function proposal()
    {
      return $this->hasOne('App\Proposal');
    }
    public function project()
    {
      return $this->belongsTo('App\GroupProject');
    }

}

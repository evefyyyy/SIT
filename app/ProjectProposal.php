<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectProposal extends Model
{
    //
	protected $table = 'project_proposals';

    public function proposal()
    {
      return $this->belongsTo('App\Proposal');
    }
    public function project()
    {
      return $this->belongsTo('App\GroupProject');
    }
}

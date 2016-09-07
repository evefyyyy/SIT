<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';ß

    public function projectProposal()
    {
      return $this->hasMany('App\ProjectProposal','proposal_id');
    }

}

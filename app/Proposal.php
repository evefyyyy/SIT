<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
	protected $table = 'proposals';

    public function projectProposal()
    {
      return $this->hasMany('App\projectProposal','proposal_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalType extends Model
{
    //
    protected $table = 'proposal_type';

    public function proposalType()
    {
      return $this->hasMany('App\ProposalType','proposal_type_id');
    }
}

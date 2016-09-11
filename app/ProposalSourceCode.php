<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalSourceCode extends Model
{
    //
    protected $table = 'proposal_sourcecode';

    public function groupProject()
    {
      return $this->belongsTo('App\GroupProject');
    }
}

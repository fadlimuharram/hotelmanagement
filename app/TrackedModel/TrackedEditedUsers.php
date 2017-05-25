<?php

namespace App\TrackedModel;

use Illuminate\Database\Eloquent\Model;

class TrackedEditedUsers extends Model
{
    public function users(){
      return $this->belongsTo('App\User','users_id');
    }
}

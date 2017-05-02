<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function rooms(){
      return $this->hasMany('App\Rooms','statuses_id');
    }
}

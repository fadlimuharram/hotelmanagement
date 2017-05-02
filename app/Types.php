<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function rooms(){
      return $this->hasMany('App\Rooms','type_id');
    }
}

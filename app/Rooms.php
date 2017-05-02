<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public function types(){
      return $this->belongsTo('App\Types','type_id');
    }

    public function status(){
      return $this->belongsTo('App\Status','statuses_id');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'picture', 'password','ktp', 'is_register',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_admin(){

      if ($this->is_register == 't') {
        return true;
      }else {
        return false;
      }

    }

    public function TrackedEditedUsers(){
      return $this->hasMany('App\TrackedModel\TrackedEditedUsers','users_id');
    }
}

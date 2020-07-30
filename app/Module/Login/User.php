<?php

namespace App\Module\Login;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $hidden = ['password'];

    public function endpoints(){
        return $this->hasMany('App\Module\Validador\Endpoint');
    }

}

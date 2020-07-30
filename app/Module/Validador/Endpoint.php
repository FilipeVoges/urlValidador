<?php

namespace App\Module\Validador;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    protected $table = 'endpoints';

    protected $hidden = ['http_body'];

    public function user(){
        return $this->belongsTo('App\Module\Login\User');
    }

}

<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use DB;

class Role extends EntrustRole
{
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function permission(){
        return $this->belongsToMany('App\Permission');
    }
}

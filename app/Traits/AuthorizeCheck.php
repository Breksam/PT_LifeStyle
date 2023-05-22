<?php

namespace App\Traits;

use Auth;

trait AuthorizeCheck{

    public function authorizeCheck($permission){
        if(!Auth::user()->can($permission)){
            throw new \Illuminate\Auth\Access\AuthorizationException("Only Admin Can Access That!");
        }
    }
}

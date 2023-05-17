<?php

namespace App\Traits;

use Auth;

trait AuthorizeCheck{

    public function authorizeCheck($permission){
        if(!Auth::user()->can($permission)){
            return "Only Admin Can Access That";
        }
    }

}
<?php

namespace App;
 

use App\User;

class Grup extends \Eloquent
{
    public function Users()
            {
            return $this->belongsToMany('App\User');
            }
    public function founder()
            {
            return User::where("id", "=", $this->admin_id)->first();
            
            }
    
}
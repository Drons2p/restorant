<?php

namespace App;
 

class Req extends \Eloquent
{
    public function User()
            {
            return $this->belongsTo('App\User');
            }
    public function Grup()
            {
            return $this->belongsTo('App\Grup');
            }
    
}
<?php

namespace App;
 

class Order extends \Eloquent
{
   
   public function Dish()
            {
            return $this->belongsToMany('App\Dish');
            }   
   public function User()
            {
            return $this->belongsTo('App\User');
            }
            
}
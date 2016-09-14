<?php

namespace App;
 

class Order extends \Eloquent
{
   
   public function Dish()
            {
            return $this->belongsToMany('App\Dish');
            }   
   public function Users()
            {
            return $this->morphedByMany('App\User', 'orderable');
            }
   public function Grups()
            {
            return $this->morphedByMany('App\Grup', 'orderable');
            }
            
}
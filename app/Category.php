<?php

namespace App;
 

class Category extends \Eloquent
{
    public function Dishes()
            {
            return $this->hasMany('App\Dish');
            }
    
}
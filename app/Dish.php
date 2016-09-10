<?php

namespace App;
 

class Dish extends \Eloquent
{
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dish; 

class DishController extends Controller
{
      public function create()
    {
                       
           if(\Gate::denies('create')){
               
            $msg = "Нет прав";
        
                return \View('error', array('msg' => $msg));
            }
            
            
           $dish = new Dish;
            
           $dish->name = \Input::get('name');
           $dish->description = \Input::get('description');
           $dish->category_id = \Input::get('category_id');
           $dish->save();


        return \Redirect::to('/');
         
    }
    
}

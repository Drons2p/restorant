<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class CategoryController extends Controller
{
 
   public function create()
    {
                    
           if(\Gate::denies('create')){
               
            $msg = "Нет прав";
        
                return \View('error', array('msg' => $msg));
            }
   
           $category = new Category;
            
           $category->name = \Input::get('name');
           $category->description = \Input::get('description'); 
           $category->save();


        return \Redirect::to('/');
         
    }
     
   public function save()
    {
                            
           if(\Gate::denies('create')){
               
            $msg = "Нет прав";
        
                return \View('error', array('msg' => $msg));
            }
            
            $id = \Input::get('id');
            
           $category = Category::where("id", "=", $id)->first();
             
             
           $category->name = \Input::get('name');
           $category->description =\Input::get('description'); 
          $category->save();


        return \Redirect::to('/');
         
    }
    
    
}

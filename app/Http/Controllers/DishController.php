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
    
    public function export()
    {
      
    $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
           'Content-type'        => 'text/html; charset=utf-8', 
          'Content-Disposition' => 'attachment; filename=orders.csv',
           'Expires'             => '0',
           'Pragma'              => 'public'
    ];


 
  $dishs = Dish::all();
  $list = $dishs->toArray();  

  array_unshift($list, array_keys($list[0]));

   $callback = function() use ($list) 
    {
        $FH = fopen('php://output', 'w');
        foreach ($list as $row) { 
            fputcsv($FH, $row);
        }
        fclose($FH);
    };

    return \Response::stream($callback, 200, $headers);
 

     }
    
}

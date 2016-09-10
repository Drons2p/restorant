<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Order;

class OrderController extends Controller
{
   
   
public function index()
    { 
             if(\Gate::denies('create')){
               
            $msg = "Нет прав";
        
                return \View('error', array('msg' => $msg));
            }
            
            
      $orders = Order::all();
      
    return \View('orders', array('orders' => $orders));
             
        
    }
   
public function create()
    {
   
           $id = \Input::get('id');
           $dish = \Input::get('dish');
           
          if (isset($id) && !empty($id)) {
               $order = Order::where("id", "=", $id)->first();
          } 
           else {
           $order = new Order;
           }
           
            
           $order->sent = \Input::get('sent');
           $order->user_id = \Session::get('user_id');
           $order->save();

   
        if (isset($dish) && !empty($dish)) {
             $order->dish()->sync($dish);
          } 
        
            

        return \Redirect::to('/');
         
    }
    
    
}

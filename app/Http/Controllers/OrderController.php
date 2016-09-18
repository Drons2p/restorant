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
             
        $orderslist = \DB::table('orderables')->where('orderable_type', '=', 'App\User')->lists('order_id');
          
      $orders = Order::whereIn('id', $orderslist)->get();;
       
    return \View('orders', array('orders' => $orders));
         
    }
    
public function grupindex()
    { 
             if(\Gate::denies('create')){
               
            $msg = "Нет прав";
        
                return \View('error', array('msg' => $msg));
            }
             
        $orderslist = \DB::table('orderables')->where('orderable_type', '=', 'App\Grup')->lists('order_id');
          
      $orders = Order::whereIn('id', $orderslist)->get();
       
    return \View('orders_grup', array('orders' => $orders));
          
    }
   
public function create()
    {
        
           if (!\Session::has('user_id')) {
                
            $msg = "Вы джолжны авторизироватся";
        
                return \View('error', array('msg' => $msg));
                
          } 
	
   
           $id = \Input::get('id');
           $dish = \Input::get('dish');
           $grup_id = \Input::get('grup_id');
           
          if (isset($id) && !empty($id)) {
               $order = Order::where("id", "=", $id)->first();
          } 
           else {
           $order = new Order;
           }
           
            
           $order->sent = \Input::get('sent');
           
           $order->user_id = \Session::get('user_id');
            
           $order->save();
           
           
        if ($grup_id > 0) {
           $order->grups()->sync([$grup_id]);
           }
        else {
           $order->users()->sync([\Session::get('user_id')]);
        }
   
        $user_id = \Session::get('user_id');
   
        if (isset($dish) && !empty($dish)) {
     
      
           \DB::table('dish_order')->where('order_id', '=', $order->id)->delete();
            
            
            
           foreach ($dish as $dis) { 
             
                $dis_ar = explode(":", $dis);
             
                
                 $order->dish()->attach($dis_ar[0], array('user_id' => $dis_ar[1], 'user_name' => $dis_ar[2]));
          }    
           
          } 
         

      return \Redirect::to('/grup/order/store/'.$grup_id);
         
    }
    
    
public function detach($order_id, $dish_id, $user_id)
    {
      
        
        \DB::table('dish_order')->where('dish_id', '=', $dish_id)->where('order_id', '=', $order_id)
          ->where('user_id', '=', $user_id)->take(1)->delete();
        
        return \Redirect::back();   
        
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



  $list = array();
  $orders = Order::all();
  $list = $orders->toArray();  
    
  $k = 0;  
  
 foreach ($orders as $order) {
    $dish_s = '';
    
    foreach ($order->dish as $dish) {
        $dish_s .= $dish->pivot->user_name .'-'. $dish->name .'-'. $dish->price .'-';
    }
    $list[$k]['dish'] = $dish_s;
    $k++;
 }
 
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

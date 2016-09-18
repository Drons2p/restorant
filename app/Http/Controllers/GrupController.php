<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Order;
use App\Grup;
use App\User;
use App\Req;

class GrupController extends Controller
{
   
   
public function accept($id)
    { 
        
             if (!\Session::has('user_id')) {
                
            $msg = "Вы джолжны авторизироватся";
        
                return \View('error', array('msg' => $msg));
                
          } 
          
          
              $req = Req::where("id", "=", $id)->first();              
              $user = User::where("id", "=", $req->user_id)->first();
          
                
          $grups = \DB::table('grup_user')->where("user_id", "=", $user->id)->lists('grup_id');
        
            
           if (!in_array($req->grup_id, $grups)) {
               $grups[] = $req->grup_id;
               $user->grups()->sync($grups);
            }
        
        $req->delete();
        
      return \Redirect::to('/');
           
    }
   
public function req($id)
    {
          if (!\Session::has('user_id')) {
                
            $msg = "Вы джолжны авторизироватся";
        
                return \View('error', array('msg' => $msg));
                
          } 
          
          
           $req = new Req;
           $req->user_id = \Session::get('user_id');
           $req->grup_id = $id;
           $req->save();
        
      return \Redirect::to('/');
    }
           
           
      
public function detach($user_id, $grup_id)
    {        
                
          if (!\Session::has('user_id')) {
                
            $msg = "Вы джолжны авторизироватся";
        
                return \View('error', array('msg' => $msg));
                
          }
           
     $deleted = \DB::table('grup_user')->where('user_id', '=', $user_id)->where('grup_id', '=', $grup_id)->delete();
    

        return \Redirect::to('/');
        
    }
           
public function create()
    {
        
              
             if (!Session::has('user_id')) {
                
            $msg = "Вы джолжны авторизироватся";
        
                return \View('error', array('msg' => $msg));
                
          } 
	
   
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

public function del($id)
    {
           Grup::where("id", "=", $id)->delete();
           \DB::table('grup_user')->where('grup_id', '=', $id)->delete();
    
    
        return \Redirect::to('/');
    }
    
}

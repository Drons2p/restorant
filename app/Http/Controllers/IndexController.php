<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;
use App\Category;
use App\Grup;
use App\Req;

class IndexController extends Controller
 {
    
     /**
     * Первая страница
     */
    public function index($grup_id = 0)
    { 
  
    $option_form = " ";
            
    if ($grup_id > 0)  {
        
     $grup_order = Grup::where("id", "=", $grup_id)->first();

  $Grup_Order_list = \DB::table('orderables')->where('orderable_id', '=', $grup_order->id)
             ->where('orderable_type', '=', 'App\Grup')->lists('order_id');
  $draft = Order::where("sent", "=", '0')->whereIn("id", $Grup_Order_list)->first();
   
    $checkbox_form = " ";
     if ($draft) {
      foreach ($draft->Dish as $draft_dish) {
            
        $draft_user_id = $draft_dish->pivot->user_id;  
        $draft_user_name = $draft_dish->pivot->user_name;  
        
          $checkbox_form .= "<div class=\"order_row\" data-price=\"$draft_dish->price\"><input class=\"hide\" type=\"checkbox\" name=\"dish[]\" value=\"$draft_dish->id:$draft_user_id:$draft_user_name\" checked>$draft_dish->name - $draft_dish->price - $draft_user_name";
            if ($grup_order->admin_id == \Session::get('user_id') or $draft_user_id == \Session::get('user_id'))  {
                $checkbox_form .= "<span class=\"glyphicon glyphicon-trash del\"></span>";      
            }
        
           $checkbox_form .= "</div>";
        } 
    
     }
    
            $title_form = "Заказ для группы " . $grup_order->name;
    
          if ($grup_order->admin_id == \Session::get('user_id')) {
            
            $option_form = "<option value=\"1\">Как заказ</option>";
          }  
         
    }
     else {
                    $title_form = "Индивидуальный заказ";
                    
                 $Ind_Order_list = \DB::table('orderables')
                 ->where('orderable_id', '=', \Session::get('user_id'))
                 ->where('orderable_type', '=', 'App\User')->lists('order_id');
                     
                  $draft = Order::where("sent", "=", '0')->whereIn("id", $Ind_Order_list)->first();
            
            $checkbox_form = " ";
            
             if ($draft) {
              foreach ($draft->Dish as $draft_dish) {
                 
                   $draft_user_id = $draft_dish->pivot->user_id;  
                $draft_user_name = $draft_dish->pivot->user_name;  
                
                  $checkbox_form .= "<div class=\"order_row\" data-price=\"$draft_dish->price\"><input class=\"hide\" type=\"checkbox\" name=\"dish[]\" value=\"$draft_dish->id:$draft_user_id:$draft_user_name\" checked>$draft_dish->name - $draft_dish->price - $draft_user_name <span class=\"glyphicon glyphicon-trash del\"></span></div>";
                } 
             
            
            $option_form = "<option value=\"1\">Как заказ</option>";
            
             }
            
             
        
     }
     
      $categories = Category::all();
      $grups = Grup::all();
      
      $Usergruplist = \DB::table('grup_user')->where('user_id', '=', \Session::get('user_id'))->lists('grup_id');
      
      $Userreqslist = \DB::table('reqs')->where("user_id", "=", \Session::get('user_id'))->lists('grup_id');
      
      $AdminGruplist = Grup::where("admin_id", "=", \Session::get('user_id'))->lists('id');
      $reqs = Req::whereIn('grup_id', $AdminGruplist)->get();
       
  
    return \View('index', array('categories' => $categories, 
                    'draft' => $draft, 'grup_id' => $grup_id,  
                  'title_form' => $title_form, 'checkbox_form' => $checkbox_form, 
                  'option_form' => $option_form, 
                 'grups' => $grups, 'reqs' => $reqs, 
                 'Usergruplist' => $Usergruplist,  
                 'Userreqslist' => $Userreqslist));
   
    }


    public function login()
    {

        $email = \Input::get('email');
        $password = \Input::get('password');
        $email=trim($email);
        $password=trim($password);
        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
   
  
            \Session::put('user_id', \Auth::user()->id);
            \Session::put('name', \Auth::user()->name);
            
            
            return \Redirect::to('/');

        } Else {
            
            $msg = "Неправильный емаил и/или пароль";
        
        return \View('error', array('msg' => $msg)); 
         
        }

    }
    

    public function Logout()
    {

        \Auth::logout();
        \Session::flush();
        return \Redirect::to('/');
    }

 }

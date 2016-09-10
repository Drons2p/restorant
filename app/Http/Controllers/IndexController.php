<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Order;
use App\Category;

class IndexController extends Controller
 {
    
     /**
     * Первая страница
     */
    public function index()
    { 
 
      $draft = Order::where("sent", "=", '0')->where("user_id", "=", \Session::get('user_id'))->first();
      $categories = Category::all();
      
    return \View('index', array('categories' => $categories, 'draft' => $draft));
             
        
    }


    public function login()
    {

        $email = \Input::get('email');
        $password = \Input::get('password');
        $email=trim($email);
        $password=trim($password);
        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
   
  
            \Session::put('user_id', \Auth::user()->id);
            
            
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

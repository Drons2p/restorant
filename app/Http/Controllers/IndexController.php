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
    public function index()
    { 
 
      $draft = Order::where("sent", "=", '0')->where("user_id", "=", \Session::get('user_id'))->first();
      $categories = Category::all();
      $grups = Grup::all();
      
      $Usergruplist = \DB::table('grup_user')->where('user_id', '=', \Session::get('user_id'))->lists('grup_id');
      $Userreqslist = \DB::table('reqs')->where("user_id", "=", \Session::get('user_id'))->lists('grup_id');
      
      $AdminGruplist = Grup::where("admin_id", "=", \Session::get('user_id'))->lists('id');
      $reqs = Req::whereIn('id', $AdminGruplist)->get();
      
      
    return \View('index', array('categories' => $categories, 'draft' => $draft, 
                 'grups' => $grups, 'reqs' => $reqs, 'Usergruplist' => $Usergruplist, 
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

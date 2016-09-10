<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User; 

class UserController extends Controller
 {


    public function create()
    {

        $email = \Input::get('email_r');
        $name = \Input::get('name_r');
        $password = \Input::get('password_r');
        $email=trim($email);
        $password=trim($password);
        
       
                
        $user_count = User::where("email", "=", $email)->count();
        
            if($user_count > 0){
                
            $msg = "Пользователь с таким адресом уже есть";
        
                return \View('error', array('msg' => $msg));
            }
            
            
            $user = new User;
           
           $user->email = $email;
           $user->name = $name;
           $user->password = \Hash::make($password);
           $user->save();


        return \Redirect::to('/');
         
        
        

    }
    
 }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\User;

class AuthController extends Controller
{
    public function Login(){
        return view('auth.Login');
    }

    public function LoginPost(Request $req){

        $req->validate([
            "email" => "required|email",
            "password" => "required|min:3"
        ]);
        $credentials = $req->only('email',"password");
        if(AUTH::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('Login'))->with("error","Invalid Email or Password") ;
    }


    public function Register(){

        return view('auth.Register');
    }
    
    public function RegisterPost(Reauest $req){
        $req->validate([
            "email" => "required|email|unique:users",
            "name" => "required",
            "password" => "required|min:3"
        ]);
        $user = new User();
        $user->name = $req->name ;
        $user->email = $req->email;

        return view('auth.Register');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(){
        return view('auth.login');
    }

    public function LoginPost(Request $req){
        $req->validate([
            "email" => "required|email",
            "password" => "required|min:3",
        ]);
        $credentials = $req->only('email',"password");
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Invalid Email or Password") ;
    }


    public function Register(){
        
        return view('auth.Register');
    }
    
    public function RegisterPost(Request $req){
        $req->validate([
            "email" => "required|email|unique:users",
            "name" => "required",
            "password" => "required|min:3",
            "image" => "required|image|max:10240|mimes:png,jpg,jpeg,svg"
        ]);
        $user = new User();
        $user->name = $req->name ;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->image = $req->file('image')->store('profile','public') ;

        if($user->save()){
            return redirect(route("login"))->with("success","Registration Successful");
        }
        return redirect(route("register"))->with("error","Registration Failed");
    }

   public function logout(){
    Auth::logout(); 

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login')->with('success', 'Logged out successfully.');
}
}

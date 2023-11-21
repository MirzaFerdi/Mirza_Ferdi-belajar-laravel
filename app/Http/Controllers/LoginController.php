<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect("/");
        }
        return view("authentication.login");

    }

    public function login(Request $request){
        if($request->isMethod("post")){
            $credentials = $request->only("email", "password");
            if(Auth::attempt($credentials)){
                return redirect()->route("index");
            }else{
                return redirect()->route("login");
            }
        }
        return view("login");
    }
    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}

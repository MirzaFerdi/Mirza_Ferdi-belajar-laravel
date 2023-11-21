<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view("authentication.register");
    }
    public function store(Request $request){
        $request = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'username' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route("login");
    }
}

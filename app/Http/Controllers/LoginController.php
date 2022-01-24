<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("default-form/login");
    }

    public function register(){
        return view("default-form/register");
    }

    public function registeruser(Request $request){
        // dd($request->all());
        user::create([
            'name' => $request->name,
            'email' => $request->id,
            'password' => bcrypt($request->pass),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

    public function loginproses(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return \redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return \redirect('/');
    }

    public function lte(){
        return view("thepages/lte");
    }

}

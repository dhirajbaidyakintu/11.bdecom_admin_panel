<?php

namespace App\Http\Controllers;
use App\Models\AdminLoginModel;
use Illuminate\Http\Request;

class LoginController extends Controller{
    //For Login Blde View
    function login(){
        return view('login');
    }

    //For Logout
    function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }

    //For Login User Name & Password
    function onLogin(Request $request){
        $user= $request->input('user');
        $pass= $request->input('pass');
        $result= AdminLoginModel::where('username','=',$user)->where('password','=',$pass)->count();
        if ($result == 1){
            $request->session()->put('user', $user);
            return 1;
        } else{
            return 0;
        }
    }
}

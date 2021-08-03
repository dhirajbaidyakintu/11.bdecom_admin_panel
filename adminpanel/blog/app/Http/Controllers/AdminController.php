<?php

namespace App\Http\Controllers;
use App\Models\AdminLoginModel;
use Illuminate\Http\Request;

class AdminController extends Controller {
    //For Admin Profile Blade View
    function AdminProfile(){
        return view('AdminProfile');
    }

    //For Admin Profile Update
    function AdminUpdate(Request $request){
        $username = $request->session()->get('user');
        $result=AdminLoginModel::where('username','=',$username)->get();
        return $result;
    }

    //For Admin Update
    function AdminUpdateData(Request $request){
        $username = $request->session()->get('user');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $number = $request->input('number');
        $result = AdminLoginModel::where('username','=',$username)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'number' => $number,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Get Admin Data
    function getAdminData(){
        $result = json_encode(AdminLoginModel::orderBy('id','desc')->get(),true);
        return $result;
    }

    //For Admin Delete
    function AdminDelete(Request $request){
        $user = $request->session()->get('user');
        $username = $request->input('username');
        if ($user==$username){
           return 0;
        } else{
            $result = AdminLoginModel::where('username',$username)->delete();
            if($result==true){
                return 1;
            } else{
                return 0;
            }
        }
    }

    //For Ads Admin Profile
    function AddAdminProfile(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        $number = $request->input('number');
        $result = AdminLoginModel::insert([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'number' => $number,
        ]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
}

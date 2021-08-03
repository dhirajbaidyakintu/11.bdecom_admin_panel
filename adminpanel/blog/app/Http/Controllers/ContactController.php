<?php

namespace App\Http\Controllers;
use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller{
    //For Contact Blade View
    function contactIndex(){
        return view('contact');
    }

    //For Data Selecting Contact
    function getContactData(){
        $result= json_encode(ContactModel::orderBy('id', 'desc')->get());
        return $result;
    }

    //For Contact Data Delete
    function contactDelete(Request $request){
        $id= $request->input('id');
        $result= ContactModel::where('id', '=', $id)->delete();
        if($result == true){
            return 1;
        } else{
            return 0;
        }
    }
}

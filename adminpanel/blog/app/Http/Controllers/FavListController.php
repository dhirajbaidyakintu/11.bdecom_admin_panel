<?php

namespace App\Http\Controllers;
use App\Models\FavListModel;
use Illuminate\Http\Request;

class FavListController extends Controller {
    //For Favourite Blade View
    function favIndex(){
        return view('favourite');
    }

    //Data Selecting
    function getFavData(){
        $result= json_encode(FavListModel::orderBy('id', 'desc')->get());
        return $result;
    }

    //For Data Delete
    function favDelete(Request $request){
        $id= $request->input('id');
        $result= FavListModel::where('id', '=', $id)->delete();
        if($result == true){
            return 1;
        }else{
            return 0;
        }
    }
}

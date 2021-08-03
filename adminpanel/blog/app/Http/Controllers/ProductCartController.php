<?php

namespace App\Http\Controllers;
use App\Models\ProductCartModel;
use Illuminate\Http\Request;

class ProductCartController extends Controller {
    //For Product Cart Blade View
    function productCartIndex(){
        return view('productCart');
    }

    //Data Selecting
    function getProductCartData(){
        $result= json_encode(ProductCartModel::orderBy('id', 'desc')->get());
        return $result;
    }

    //For Data Delete
    function productCartDelete(Request $request){
        $id= $request->input('id');
        $result= ProductCartModel::where('id', '=', $id)->delete();
        if($result == true){
            return 1;
        } else{
            return 0;
        }
    }
}

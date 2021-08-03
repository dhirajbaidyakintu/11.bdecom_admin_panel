<?php

namespace App\Http\Controllers;
use App\Models\ProductOrderModel;
use Illuminate\Http\Request;

class ProductOrderController extends Controller{
    //For Product Order Blade View
    function productOrderIndex(){
        return view('productOrder');
    }

    //For Get Product Order
    function getProductOrderData(){
        $result= json_encode(ProductOrderModel::orderBy('id', 'desc')->get());
        return $result;
    }

    //For Product Order Delete
    function productOrderDelete(Request $request){
        $id= $request->input('id');
        $result= ProductOrderModel::where('id', '=', $id)->delete();
        if($result == true){
            return 1;
        } else{
            return 0;
        }
    }

    //For Get Product Order Details
    function productOrderDetails(Request $request){
        $id= $request->input('id');
        $result= json_encode(ProductOrderModel::where('id', '=', $id)->get());
        return $result;
    }

    //For Product Order Data Update
    function productOrderUpdate(Request $request){
        $id= $request->input('id');
        $order_status= $request->input('order_status');
        $result= ProductOrderModel::where('id', '=', $id)->update([
            'order_status'=>$order_status
        ]);
        if($result == true){
            return 1;
        } else{
            return 0;
        }
    }
}

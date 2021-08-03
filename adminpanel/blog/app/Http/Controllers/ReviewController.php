<?php

namespace App\Http\Controllers;
use App\Models\ReviewModel;
use Illuminate\Http\Request;

class ReviewController extends Controller{
    //For Review Blade View
    function reviewIndex(){
        return view('review');
    }

    //For Get Review
    function getReviewData(){
        $result= json_encode(ReviewModel::orderBy('id', 'desc')->get());
        return $result;
    }

    //For Review Delete
    function reviewDelete(Request $request){
        $id= $request->input('id');
        $result= ReviewModel::where('id', '=', $id)->delete();
        if($result == true){
            return 1;
        } else{
            return 0;
        }
    }
}

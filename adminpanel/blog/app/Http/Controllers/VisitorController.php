<?php

namespace App\Http\Controllers;
use App\Models\VisitorModel;
use Illuminate\Http\Request;

class VisitorController extends Controller{
    //For Visitor View
    function visitorIndex(){
        $visitorData= json_decode(VisitorModel::orderBy('id','desc')->take(500)->get());
        return view('visitor', ['visitorDataKey'=>$visitorData]);
    }
}

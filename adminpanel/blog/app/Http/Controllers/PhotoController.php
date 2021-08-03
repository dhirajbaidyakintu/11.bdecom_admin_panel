<?php

namespace App\Http\Controllers;
use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller{
    //For Photo Gallery Blade View
    function PhotoIndex(){
        return view('PhotoGallery');
    }

    //For Photo Delete
    function PhotoDelete(Request $request){
        $OldPhotoURL=$request->input('OldPhotoURL');
        $OldPhotoID=$request->input('id');
        $OldPhotoURLArray= explode("/", $OldPhotoURL);
        $OldPhotoName=end($OldPhotoURLArray);
        Storage::delete('public/'.$OldPhotoName);
        $DeleteRow= ImageModel::where('id','=',$OldPhotoID)->delete();
        DB::statement("SET @autoid :=0;");
        DB::statement("UPDATE images SET id = @autoid:=(@autoid+1);");
        DB::statement("ALTER TABLE images AUTO_INCREMENT=1;");
        return  $DeleteRow;
    }

    //For JSON Photo Data
    function PhotoJSON(){
        return ImageModel::orderBy('id','desc')->take(9)->get();
    }

    //
    function PhotoJSON1(){
        return ImageModel::orderBy('id','desc')->get();
    }

    //For Photo JSON By ID
    function PhotoJSONByID(Request $request){
        $FirstID=$request->id;
        $LastID=$FirstID-9;
        return ImageModel::where('id','<=',$FirstID)->where('id','>',$LastID)->orderBy('id','desc')->get();
    }

    //For Photo Upload
    function PhotoUpload(Request $request){
        $photoPath=  $request->file('photo')->store('public');
        $photoName=(explode('/',$photoPath))[1];
        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;
        $result= ImageModel::insert(['location'=>$location]);
        DB::statement("SET @autoid :=0;");
        DB::statement("UPDATE images SET id = @autoid:=(@autoid+1);");
        DB::statement("ALTER TABLE images AUTO_INCREMENT=1;");
        return $result;
    }
}

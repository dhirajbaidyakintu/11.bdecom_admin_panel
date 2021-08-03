<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class CategoryAndSubCategoryController extends Controller {
    //For Category And Subcategory View
    function categoryAndSubCategoryIndex(){
        return view('categoryAndSubCategory');
    }

    //For Category Select
    function SelectOptionCategory(){
        $Category = CategoryModel::all();
        return $Category;
    }

    //For Subcategory Select
    function SelectSubCategory(Request $request){
        $CategoryName = $request->input('CategoryName');
        $result = SubCategoryModel::where('cat1_name','=',$CategoryName)->get();
        return $result;
    }

    //For Select Subcategory All Data
    function SelectOptionSubCategory(Request $request){
        $SubCategory = SubCategoryModel::all();
        return $SubCategory;
    }

    //For Add Category List
    function AddCategoryList(Request $request){
        $cat1_name = $request->input('cat1_name');
        $cat1_image = $request->input('cat1_image');
        $result = CategoryModel::insert([
            'cat1_name' => $cat1_name,
            'cat1_img' => $cat1_image
        ]);
        if($result==true){
            return 1;
        } else{
            return 0;
        }
    }

    //For Add Subcategory List
    function AddSubCategoryList(Request $request){
        $cat1_name = $request->input('cat1_name');
        $cat2_name = $request->input('cat2_name');
        $result = SubCategoryModel::insert([
            'cat1_name' => $cat1_name,
            'cat2_name' => $cat2_name
        ]);
        if($result==true){
            return 1;
        } else{
            return 0;
        }
    }

    //For Delete Category
    function DeleteCategory(Request $result){
        $cat1_name = $result->input('cat1_name');
        $result1 = CategoryModel::where('cat1_name','=',$cat1_name)->delete();
        $result2 = SubCategoryModel::where('cat1_name','=',$cat1_name)->delete();
        if($result1==true || $result2==true){
            return 1;
        } else{
            return 0;
        }
    }

    //For Delete Subcategory
    function DeleteSubCategory(Request $result){
        $cat1_name = $result->input('cat1_name');
        $cat2_name = $result->input('cat2_name');
        $result1 = SubCategoryModel::where('cat1_name','=',$cat1_name)->where('cat2_name','=',$cat2_name)->delete();
        if($result1==true){
            return 1;
        } else{
            return 0;
        }
    }

}

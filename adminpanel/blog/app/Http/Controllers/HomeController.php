<?php
namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\ContactModel;
use App\Models\FavListModel;
use App\Models\ImageModel;
use App\Models\ProductCartModel;
use App\Models\ProductDetailsModel;
use App\Models\ProductListModel;
use App\Models\ProductOrderModel;
use App\Models\ReviewModel;
use App\Models\SiteInformationModel;
use App\Models\SliderModel;
use App\Models\SubCategoryModel;
use App\Models\VisitorModel;


class HomeController extends Controller{
    //For Home Blade View
    function homeIndex(){
        $totalVisitor= VisitorModel::count();
        $totalProductList= ProductListModel::count();
        $totalProductOrder= ProductOrderModel::count();
        $totalContact= ContactModel::count();
        $totalReview= ReviewModel::count();
        $totalSiteInfo= SiteInformationModel::count();
        $totalSlider= SliderModel::count();
        $totalCategory= CategoryModel::count();
        $totalSubCategory= SubCategoryModel::count();
        $totalImageGallery= ImageModel::count();
        $totalProductCart= ProductCartModel::count();
        $totalFavList= FavListModel::count();
        return view('home',[
            'totalVisitorKey'=> $totalVisitor,
            'totalProductListKey'=> $totalProductList,
            'totalProductOrderKey'=> $totalProductOrder,
            'totalContactKey'=> $totalContact,
            'totalReviewKey'=> $totalReview,
            'totalSiteInfoKey'=> $totalSiteInfo,
            'totalSliderKey'=> $totalSlider,
            'totalCategoryKey'=> $totalCategory,
            'totalSubCategoryKey'=> $totalSubCategory,
            'totalImageGalleryKey'=> $totalImageGallery,
            'totalProductCartKey'=> $totalProductCart,
            'totalFavListKey'=> $totalFavList,
        ]);
    }
}

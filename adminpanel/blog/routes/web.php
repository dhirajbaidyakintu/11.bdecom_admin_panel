<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavListController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\SiteInformationController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryAndSubCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;

//For Home and Visitor
Route::get('/', [HomeController::class, 'homeIndex'])->middleware('loginCheck');
Route::get('/visitor', [VisitorController::class, 'visitorIndex'])->middleware('loginCheck');

//For Contact Management
Route::get('/contact', [ContactController::class, 'contactIndex'])->middleware('loginCheck');
Route::get('/getContactData', [ContactController::class, 'getContactData'])->middleware('loginCheck');
Route::post('/contactDelete', [ContactController::class, 'contactDelete'])->middleware('loginCheck');

//For Review Management
Route::get('/review', [ReviewController::class, 'reviewIndex'])->middleware('loginCheck');
Route::get('/getReviewData', [ReviewController::class, 'getReviewData'])->middleware('loginCheck');
Route::post('/reviewDelete', [ReviewController::class, 'reviewDelete'])->middleware('loginCheck');

//For Favourite Management
Route::get('/favourite', [FavListController::class, 'favIndex'])->middleware('loginCheck');
Route::get('/getFavData', [FavListController::class, 'getFavData'])->middleware('loginCheck');
Route::post('/favDelete', [FavListController::class, 'favDelete'])->middleware('loginCheck');

//For ProductOrder Management
Route::get('/productOrder', [ProductOrderController::class, 'productOrderIndex'])->middleware('loginCheck');
Route::get('/getProductOrderData', [ProductOrderController::class, 'getProductOrderData'])->middleware('loginCheck');
Route::post('/productOrderDelete', [ProductOrderController::class, 'productOrderDelete'])->middleware('loginCheck');
Route::post('/getProductOrderDetails', [ProductOrderController::class, 'productOrderDetails'])->middleware('loginCheck');
Route::post('/productOrderUpdate', [ProductOrderController::class, 'productOrderUpdate'])->middleware('loginCheck');

//For Product Cart Management
Route::get('/productCart', [ProductCartController::class, 'productCartIndex'])->middleware('loginCheck');
Route::get('/getProductCartData', [ProductCartController::class, 'getProductCartData'])->middleware('loginCheck');
Route::post('/productCartDelete', [ProductCartController::class, 'productCartDelete'])->middleware('loginCheck');

//For Login Management
Route::get('/login', [LoginController::class, 'login']);
Route::post('/onLogin', [LoginController::class, 'onLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

//For Product Management
Route::get('/product', [ProductController::class, 'ProductIndex'])->middleware('loginCheck');
Route::get('/getProductData', [ProductController::class, 'getProductData'])->middleware('loginCheck');
Route::post('/ProductDelete', [ProductController::class, 'ProductDelete'])->middleware('loginCheck');
Route::post('/getProductDetails', [ProductController::class, 'getProductDetails'])->middleware('loginCheck');
Route::post('/getProductList', [ProductController::class, 'getProductList'])->middleware('loginCheck');
Route::post('/ProductListUpdate', [ProductController::class, 'ProductListUpdate'])->middleware('loginCheck');
Route::post('/ProductDetailsUpdate', [ProductController::class, 'ProductDetailsUpdate'])->middleware('loginCheck');
Route::post('/AddProductDetails', [ProductController::class, 'AddProductDetails'])->middleware('loginCheck');
Route::post('/AddProductList', [ProductController::class, 'AddProductList'])->middleware('loginCheck');

//For Category And SubCategory
Route::get('/categoryAndSubCategory', [CategoryAndSubCategoryController::class, 'categoryAndSubCategoryIndex']);
Route::get('/SelectOptionCategory', [CategoryAndSubCategoryController::class, 'SelectOptionCategory']);
Route::post('/SelectSubCategory', [CategoryAndSubCategoryController::class, 'SelectSubCategory']);
Route::get('/SelectOptionSubCategory', [CategoryAndSubCategoryController::class, 'SelectOptionSubCategory']);
Route::post('/AddCategoryList', [CategoryAndSubCategoryController::class, 'AddCategoryList']);
Route::post('/AddSubCategoryList', [CategoryAndSubCategoryController::class, 'AddSubCategoryList']);
Route::post('/DeleteCategory', [CategoryAndSubCategoryController::class, 'DeleteCategory']);
Route::post('/DeleteSubCategory', [CategoryAndSubCategoryController::class, 'DeleteSubCategory']);

//For Photo Gallery
Route::get('/Photo', [PhotoController::class, 'PhotoIndex'])->middleware('loginCheck');
Route::post('/PhotoUpload', [PhotoController::class, 'PhotoUpload'])->middleware('loginCheck');
Route::get('/PhotoJSON', [PhotoController::class, 'PhotoJSON'])->middleware('loginCheck');
Route::get('/PhotoJSON1', [PhotoController::class, 'PhotoJSON1'])->middleware('loginCheck');
Route::get('/PhotoJSONByID/{id}', [PhotoController::class, 'PhotoJSONByID'])->middleware('loginCheck');
Route::post('/PhotoDelete', [PhotoController::class, 'PhotoDelete'])->middleware('loginCheck');

//For Site Information Management
Route::get('/AboutCompany', [SiteInformationController::class, 'AboutCompanyIndex'])->middleware('loginCheck');
Route::get('/AboutUs', [SiteInformationController::class, 'AboutUsIndex'])->middleware('loginCheck');
Route::get('/Address', [SiteInformationController::class, 'AddressIndex'])->middleware('loginCheck');
Route::get('/DeliveryNotice', [SiteInformationController::class, 'DeliveryNoticeIndex'])->middleware('loginCheck');
Route::get('/PrivacyPolicy', [SiteInformationController::class, 'PrivacyPolicyIndex'])->middleware('loginCheck');
Route::get('/Purchase', [SiteInformationController::class, 'PurchaseIndex'])->middleware('loginCheck');
Route::get('/SocialLink', [SiteInformationController::class, 'SocialLinkIndex'])->middleware('loginCheck');
Route::get('/Terms', [SiteInformationController::class, 'TermsIndex'])->middleware('loginCheck');
Route::get('/getSiteInfoData', [SiteInformationController::class, 'getSiteInfoData'])->middleware('loginCheck');
Route::post('/SiteInfoUpdate', [SiteInformationController::class, 'SiteInfoUpdate'])->middleware('loginCheck');
Route::post('/AboutUsUpdate', [SiteInformationController::class, 'AboutUsUpdate'])->middleware('loginCheck');
Route::post('/PrivacyPolicyUpdate', [SiteInformationController::class, 'PrivacyPolicyUpdate'])->middleware('loginCheck');
Route::post('/PurchaseUpdate', [SiteInformationController::class, 'PurchaseUpdate'])->middleware('loginCheck');
Route::post('/TermsUpdate', [SiteInformationController::class, 'TermsUpdate'])->middleware('loginCheck');
Route::post('/AddressUpdate', [SiteInformationController::class, 'AddressUpdate'])->middleware('loginCheck');
Route::post('/AboutCompanyUpdate', [SiteInformationController::class, 'AboutCompanyUpdate'])->middleware('loginCheck');
Route::post('/DeliveryNoticeUpdate', [SiteInformationController::class, 'DeliveryNoticeUpdate'])->middleware('loginCheck');
Route::post('/FacebookLinkUpdate', [SiteInformationController::class, 'FacebookLinkUpdate'])->middleware('loginCheck');
Route::post('/TwitterLinkUpdate', [SiteInformationController::class, 'TwitterLinkUpdate'])->middleware('loginCheck');
Route::post('/LinkedinLinkUpdate', [SiteInformationController::class, 'LinkedinLinkUpdate'])->middleware('loginCheck');
Route::post('/AndroidLinkUpdate', [SiteInformationController::class, 'AndroidLinkUpdate'])->middleware('loginCheck');
Route::post('/IosLinkUpdate', [SiteInformationController::class, 'IosLinkUpdate'])->middleware('loginCheck');

//For Admin profile Management
Route::get('/adminProfile', [AdminController::class, 'AdminProfile'])->middleware('loginCheck');
Route::get('/AdminUpdate', [AdminController::class,'AdminUpdate'])->middleware('loginCheck');
Route::post('/AdminUpdateData', [AdminController::class,'AdminUpdateData'])->middleware('loginCheck');
Route::get('/getAdminData', [AdminController::class, 'getAdminData'])->middleware('loginCheck');
Route::post('/AdminDelete', [AdminController::class, 'AdminDelete'])->middleware('loginCheck');
Route::post('/AddAdminProfile', [AdminController::class, 'AddAdminProfile'])->middleware('loginCheck');

//For Slider Management
Route::get('/Slider', [SliderController::class, 'SliderIndex'])->middleware('loginCheck');
Route::get('/getSliderData', [SliderController::class, 'getSliderData'])->middleware('loginCheck');
Route::post('/SliderDelete', [SliderController::class, 'SliderDelete'])->middleware('loginCheck');
Route::post('/getSliderDetails', [SliderController::class, 'getSliderDetails'])->middleware('loginCheck');
Route::post('/SliderUpdate', [SliderController::class, 'SliderUpdate'])->middleware('loginCheck');
Route::post('/AddSlider', [SliderController::class, 'AddSlider'])->middleware('loginCheck');

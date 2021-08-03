<?php

namespace App\Http\Controllers;
use App\Models\SiteInformationModel;
use Illuminate\Http\Request;

class SiteInformationController extends Controller {
    //For About Company Blade View
    function AboutCompanyIndex(){
        return view('SiteInfo/AboutCompany');
    }

    //For About Us Blade View
    function AboutUsIndex(){
        return view('SiteInfo/AboutUs');
    }

    //For Address Blade View
    function AddressIndex(){
        return view('SiteInfo/Address');
    }

    //For Delivery Notice Blade View
    function DeliveryNoticeIndex(){
        return view('SiteInfo/DeliveryNotice');
    }

    //For Privacy Policy Blade View
    function PrivacyPolicyIndex(){
        return view('SiteInfo/PrivacyPolicy');
    }

    //For Purchase Guide Blade View
    function PurchaseIndex(){
        return view('SiteInfo/Purchase');
    }

    //For Social Link Blade View
    function SocialLinkIndex(){
        return view('SiteInfo/SocialLink');
    }

    //For Terms Blade View
    function TermsIndex(){
        return view('SiteInfo/Terms');
    }

    //For Get Site Information Data
    function getSiteInfoData(){
        $result = json_encode(SiteInformationModel::where('id',"1")->get(),true);
        return $result;
    }

    //For About Us Update
    function AboutUsUpdate(Request $request){
        $about = $request->input('about');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'about' => $about,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Privacy Policy Update
    function PrivacyPolicyUpdate(Request $request){
        $ploicy = $request->input('ploicy');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'ploicy' => $ploicy,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Purchase Update
    function PurchaseUpdate(Request $request){
        $purchase_guide = $request->input('purchase_guide');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'purchase_guide' => $purchase_guide,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }


    //For Terms Update
    function TermsUpdate(Request $request){
        $terms = $request->input('terms');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'terms' => $terms,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Address Update
    function AddressUpdate(Request $request){
        $address = $request->input('address');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'address' => $address,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For About Company Update
    function AboutCompanyUpdate(Request $request){
        $about_company = $request->input('about_company');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'about_company' => $about_company,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Delivery Notice Update
    function DeliveryNoticeUpdate(Request $request){
        $delivery_notice = $request->input('delivery_notice');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'delivery_notice' => $delivery_notice,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Facebook Link Update
    function FacebookLinkUpdate(Request $request){
        $facebook_link = $request->input('facebook_link');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'facebook_link' => $facebook_link,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Twitter Link Update
    function TwitterLinkUpdate(Request $request){
        $twitter_link = $request->input('twitter_link');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'twitter_link' => $twitter_link,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //For Instagram Link Update
    function LinkedinLinkUpdate(Request $request){
        $instagram_link = $request->input('instagram_link');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'instagram_link' => $instagram_link,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //
    function AndroidLinkUpdate(Request $request){
        $android_app_link = $request->input('android_app_link');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'android_app_link' => $android_app_link,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    //
    function IosLinkUpdate(Request $request){
        $ios_app_link = $request->input('ios_app_link');
        $result = SiteInformationModel::where('id','=',"1")->update([
            'ios_app_link' => $ios_app_link,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}

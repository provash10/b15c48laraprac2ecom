<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index (){
        // $products = Product::get();
        $hotProducts = Product::where('product_type', 'hot')->get();
        $newProducts = Product::where('product_type','new')->get();
        $regularProducts = Product::where('product_type','regular')->get();
        $discountProducts = Product::where('product_type','discount')->get();
        
        return view ('index', compact('hotProducts','newProducts','regularProducts','discountProducts'));
    }

    public function shop(){
        return view('shop');
    }

    public function returnProcess(){
        return view('return-process');
    }

    public function categoryProducts(){
        return view('category-products');
    }

    public function subCategoryProducts(){
        return view('sub-category-products');
    }

    public function viewCart(){
        return view('view-cart');
    }

    public function checkOut(){
        return view('checkout');
    }

    public function productDetails($id){
        // for single data
        // $product = Product::find($id);

        // for multiple data
        $product = Product::with('color', 'size','galleryImage', 'review')->where('id', $id)->first();
        // dd($product);
        return view('product-details', compact('product'));
    }

    public function typeProducts(){
        return view('type-products');
    }
    

    // Policy Pages

    public function privacyPolicy(){
        return view ('privacy-policy');
    }

    public function termsConditions(){
        return view ('terms-conditions');
    }

    public function refundPolicy(){
        return view ('refund-policy');
    }
    public function paymentPolicy(){
        return view ('payment-policy');
    }

    public function aboutUs(){
        return view ('about-us');
    }

    public function contactUs(){
        return view('contact-us');
    }
}

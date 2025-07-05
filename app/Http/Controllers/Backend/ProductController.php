<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Review;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function productList(){
        // $products = Product::get();
        // $products = Product::orderBy('id','desc')->get();
        $products = Product::orderBy('id','desc')->with('category','subCategory')->get();
        // dd($products);
        return view('backend.product.list', compact('products'));
    }
    public function productCreate(){
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('backend.product.create', compact('categories', 'subCategories'));
    }

    public function productStore(Request $request){
        $product = new Product();

        if(isset($request->image)){
        $imageName = rand().'-product-'.'.'.$request->image->extension();
        $request->image->move('backend/images/product',$imageName);

        // DB image Upload
        $product->image = $imageName;
    }

        $product -> name =$request->name;
        $product -> slug = Str::slug($request->name);
        $product -> cat_id =$request->cat_id;
        $product -> sub_cat_id =$request->sub_cat_id;
        $product -> sku_code =$request-> sku_code;
        $product -> buying_price =$request-> buying_price;
        $product -> regular_price =$request-> regular_price;
        $product -> discount_price =$request-> discount_price;
        $product -> qty =$request-> qty;
        $product -> description =$request-> description;
        $product -> policy =$request-> policy;
        $product -> product_type =$request-> product_type;
        
        $product->save();

        // For Multiple Color, Size & GalleryImage

        if(isset($request->color) && $request->color[0] != null){
             //add color
        // dd($request->color);
        foreach($request->color as $color_name){
            $color = new Color();

            $color->product_id = $product->id;
            $color->color_name = $color_name;

            $color->save();
        }
        }

        if(isset($request->size) && $request->size[0] != null){
            //add size
        // dd($request->size);
        foreach($request->size as $size_name){
            $size = new Size();

            $size->product_id = $product->id;
            $size->size_name = $size_name;

            $size->save();
        }
        }

        //GalleryImage

        if(isset($request->galleryImage)){
            foreach($request->galleryImage as $image){
                $galleryImage = new GalleryImage();

                $galleryImage->product_id = $product->id;

                $imageName = rand().'-galleryimage-'.'.'.$image->extension();
                $image->move('backend/images/galleryImage',$imageName);

                $galleryImage->image = $imageName;

                $galleryImage->save();
            }
        }
       
        

        return redirect()->back();
        // return redirect('backend.product.list');
    }

    public function productDelete($id){
        $product = Product::find($id);

        $colors = Color::where('product_id', $product->id)->get();
        $sizes = Size::where('product_id', $product->id)->get();
        $galleryImages = GalleryImage::where('product_id', $product->id)->get();
        $reviews = Review::where('product_id',$product->id)->get();
       
        // dd($product);
        // dd($color);

         // public folder image Delete
    if($product->image && file_exists('backend/images/product/'.$product->image)){
        unlink('backend/images/product/'.$product->image);
    }

    $product->delete();

    // Multiple Colors Delete
    if($colors->isNotEmpty()){
        foreach($colors as $color){
            $color->delete();
        }
    }
    // Multiple Sizes Delete
    if($sizes->isNotEmpty()){
        foreach($sizes as $size){
            $size->delete();
        }
    }

    // Multiple galleryImages Delete
    if($galleryImages->isNotEmpty()){
        foreach($galleryImages as $image){

            if($image->image && file_exists('backend/images/galleryImage/'.$image->image)){
        unlink('backend/images/galleryImage/'.$image->image);
    }
            $image->delete();
        }
    }

    // Multiple reviews Delete
    if($reviews->isNotEmpty()){
        foreach($reviews as $review){
            $review->delete();
        }
    }


    return redirect()->back();
    }

    Public function productEdit($id){
        $product = Product::where('id',$id)->with('color', 'size', 'galleryImage')->first();
        // dd($product);
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('backend.product.edit', compact('product', 'categories', 'subCategories'));
    }
}

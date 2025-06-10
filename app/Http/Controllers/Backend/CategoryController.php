<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function categoryList(){
        $categories = Category::get();
        // dd($categories);
        return view('backend.category.list', compact('categories'));
    }

   public function categoryCreate(){
    return view('backend.category.create');
   }

   public function categoryStore(Request $request){
    $category = new Category();

    $category->name = $request->name;
    $category->slug =Str::slug ($request->name);
    // $category->image = $request->image;
    // if image come form Form

    // public folder image upload

    if(isset($request->image)){
        $imageName = rand().'-category-'.'.'.$request->image->extension();
        $request->image->move('backend/images/category',$imageName);

        // DB image Upload
        $category->image = $imageName;
    }

    $category->save();
    return redirect('admin/category/list');
   }

   public function categoryDelete($id){
    $category = category::find($id);
    // dd($category);
    // public folder image Delete
    if($category->image && file_exists('backend/images/category/'.$category->image)){
        unlink('backend/images/category/'.$category->image);
    }
    // DB Image Delete
     $category->delete (); 
     return redirect()->back();
   }

   public function categoryEdit($id){
    $category = category::find($id);
    // dd($category);
    return view('backend.category.edit',compact('category'));
   }

   public function categoryUpdate(Request $request, $id){
    $category = category::find($id);
    // dd($category);
    $category->name = $request->name;
    $category->slug =Str::slug($request->name);

    if(isset($request->image)){
        if($category->image && file_exists('backend/images/category/'.$category->image)){
            unlink('backend/images/category/'.$category->image);
        }

        $imageName = rand().'-categoryUpdate-'.'.'.$request->image->extension();
        $request->image->move('backend/images/category/',$imageName);

        $category->image = $imageName;
    }
     $category->save();
    return redirect()->back();
   }
}

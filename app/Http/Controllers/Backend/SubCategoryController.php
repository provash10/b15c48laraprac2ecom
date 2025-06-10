<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function subCategoryList(){
        // $subCategories = SubCategory::get();
        // after Eloquent Relation get with category (Model)
        $subCategories = SubCategory::with('category')->get();
        // dd($subCategories);
        return view('backend.sub-category.list', compact('subCategories'));
    }
    
    public function subCategoryCreate(){
        // $categories =  Category::get();
        $categories =  Category::orderBy('name','asc')->get();
        // dd($categories);
        return view('backend.sub-category.create', compact('categories'));
    }

    public function subCategoryStore(Request $request){
        $subCategory = new SubCategory();

        $subCategory->cat_id = $request->cat_id;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);

        $subCategory->save();
        // return redirect('admin/category/list');
         return redirect()->back();

    }

    public function subCategoryEdit($id){
        $subCategory = SubCategory::find($id);
        $categories =  Category::orderBy('name','asc')->get();
        // dd($subCategory);
        return view('backend.sub-category.edit', compact('subCategory','categories'));
    }

    public function subCategoryUpdate(Request $request, $id){
        $subCategory = SubCategory::find($id);

        $subCategory->cat_id = $request ->cat_id;
        $subCategory->name = $request ->name;
        $subCategory->slug = Str::slug($request->name);

        $subCategory->save();
        return redirect('admin/sub-category/list');

    }

    public function subCategoryDelete($id){
        $subCategory = SubCategory::find($id);

        $subCategory->delete();
        return redirect()->back();
    }
}

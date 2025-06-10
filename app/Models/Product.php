<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'cat_id','id');
    }

    public function color(){
        return $this->hasMany(Color::class, 'cat_id', 'id');
      }

      public function size(){
        return $this->hasMany(Size::class, 'cat_id', 'id');
      }

      public function galleryImage(){
        return $this->hasMany(GalleryImage::class, 'cat_id', 'id');
      }

       public function review(){
        return $this->hasMany(Review::class, 'cat_id', 'id');
      }



}

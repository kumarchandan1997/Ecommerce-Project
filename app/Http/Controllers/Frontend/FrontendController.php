<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Review;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_product=Product::where('trending','1')->get();
       $category=Category::all();
        return view('frontend.index',compact('featured_product','category'));
    }

    public function category_product($slug)
    {
      if(Category::where('slug',$slug)->exists())
      {
        $category=Category::where('slug',$slug)->first();
        $featured_product=Product::where('cate_id',$category->id)->get();
        return view('frontend.category_product',compact('featured_product','category'));
      }
      else{
        return redirect('/')->with('status','Slug does not exists');
      }
    }

    public function productview($cate_slug ,$prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
         
        {
            if(Product::where('slug',$prod_slug)->exists())
            {
               $products=Product::where('slug',$prod_slug)->first();
               $attribute_values=AttributeValue::all();
               $ratings=Rating::where('prod_id',$products->id)->get();
               $rating_sum=Rating::where('prod_id',$products->id)->sum('stars_rated');
               $user_rating =Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
               $reviews=Review::where('prod_id',$products->id)->get();
               if($ratings->count()>0)
               {
                $rating_value = $rating_sum /$ratings->count();
               }
               else{
                $rating_value=0;
               }
                
              //  dd($rating_value);
               return view('frontend.products.view',compact('products','ratings','rating_value','user_rating','reviews','attribute_values'));
            }
            else{
                return redirect('/')->with('status','The link is broken');
            }
        }
        else{
            return redirect('/')->with('status','No such category Found');
        }
        
    }
    
   public function category()
   {
    $category = Category::where('status','1')->get();
    return view('frontend.category.category',compact('category'));
   }


   public function view_category($slug)
   {
    if(Category::where('slug',$slug)->exists())
    {
      $category=Category::where('slug',$slug)->first();
      $products=Product::where('cate_id',$category->id)->get();
      return view('frontend.products.index',compact('products','category'));
    }
    else{
      return redirect('/')->with('status','Slug does not exists');
    }
   }

   public function dashindex()
     {
         return view('admin.index');
     }

//    public function productview($cate_slug , $prod_slug)
//    {

//    }
}

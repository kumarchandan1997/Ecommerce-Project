<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Order;
use App\MOdels\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
      $stars_rated = $request->input('product_rating');
      $product_id = $request->input('product_id');
      
      $product_check = Product::where('id',$product_id)->where('status','1')->first();
      if($product_check)
      {
        //    $verified_purches = Order::where('orders.user_id',Auth::id())
        //                        ->join('order_items','orders.id'.'order_items.order_id')
        //                        ->where('order_items.prod_id',$product_id)->get();

                               $verified_purches = DB::table('orders')
                               ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                               ->where('order_items.prod_id',$product_id)->get();
       

          if($verified_purches->count() >0)
          {
               $existing_rating = Rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
               if($existing_rating)
               {
                $existing_rating->stars_rated =$stars_rated;
                $existing_rating->update();
               }
               else{
                Rating::create([
                    'user_id' => Auth::id(),
                    'stars_rated' => $stars_rated,
                    'prod_id'  => $product_id
                ]);
                //dd($verified_purches);
                return redirect()->back()->with('status','Thanks For Rating To This Product');

               }
                   }
                   else{
                    return redirect()->back()->with('status','You Cannot Rate This Product Withot Purched');

                   }            
      }
      else{
        return redirect()->back()->with('status','Not A Falid Product');
      }
    }

    public function addreview($product_slug)
    {
       $products=Product::where('status','1')->where('slug',$product_slug)->first();
      if($products)
      {
       $product_id=$products->id;
       $review=Review::where('user_id',Auth::id())->where('prod_id',$products->id)->first();
       if($review)
       {
       return view('frontend.reviews.edit',compact('review'));
       }
       else
       {
        $verified_purches = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->where('order_items.prod_id',$product_id)->get();
        return view('frontend.review',compact('products','verified_purches'));
       }
       
      }
      else{
     return redirect()->back()->with('status',"The link you followed was broken");
      }
     
    }

    public function store(Request $request)
    {
      $product_id=$request->input('product_id');
      $product=Product::where('id',$product_id)->where('status','1')->first();
      if($product)
      {
        $reviews=$request->input('reviews');
        $new_review =Review::create([
          'user_id' =>Auth::id(),
          'prod_id'  =>$product_id,
          'reviews' =>$reviews
        ]);
         $category_slug =$product->category->slug;
         $product_slug =$product->slug;
        if($new_review)
        {
          //return redirect()->back()->with('status',"Thank for writting a review");
          return redirect('category/'.$category_slug.'/'.$product_slug)->with('status',"Thank for writting a review");
        }
        else{
          return redirect()->back()->with('status',"Thank for writting a review");
        }
      }
    }

    public function edit($product_slug)
    {
      $product=Product::where('slug',$product_slug)->where('status','1')->first();
      if($product)
      {
        $product_id=$product->id;
        $review=Review::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
        if($review)
        {
          return view('frontend.reviews.edit',compact('review','product'));
        }
        else{
          return redirect()->back()->with('status',"The link you followed are broken");
        }
      }
      else{
        return redirect()->back()->with('status',"The link you followed are broken");
      }
    }
  public function update(Request $request)
  {
    $user_review =$request->input('reviews');
    if($user_review != '')
    {
      $review_id=$request->input('review_id');
      $review=Review::where('id',$review_id)->where('user_id',Auth::id())->first();
      if($review)
      {
        $review->reviews =$request->input('reviews');
        $review->update();
        return redirect('category/'.$review->product->category->slug.'/'.$review->product->slug)->with('status',"Data Updated Successfully");
      }
      else{
        return redirect()->back()->with('status',"The link you followed are broken");
      }
    }
    else{
      return redirect()->back()->with('status',"The link you followed are broken");
    }
  }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whishlist;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class WhishlistController extends Controller
{
    public function whistlist()
    {
        $whishlist = Whishlist::where('user_id',Auth::id())->get();
        // dd($whishlist);
        return view('frontend.whistlist',compact('whishlist'));
    }

    public function store(Request $request)
    {
    $prod_id = $request->input('prod_id');
      if(Auth::check())
      {
        $prod_check =Product::where('id',$prod_id)->first();
        if($prod_check)
        {
            if(Whishlist::where('prod_id',$prod_id  )->where('user_id',Auth::id())->exists())
            {
                return response()->json(['status' =>$prod_check->name."Already Added To Whishlist"]);
            }
            else{
                $wish = new Whishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' =>$prod_check->name."Added To wishlist"]); 
            }
        }
      }
      else
      {
        return response()->json(['status' =>"Login To Continue"]);
      }
    }
    public function list()
    {
    return Product::all();
    }

    public function store1(Request $request)
    {
        $review=new Review;
        $review->prod_id=$request->prod_id;
        $review->user_id=$request->user_id;
        $review->reviews=$request->reviews;
        $review->created_at=$request->created_at;
        $review->updated_at=$request->updated_at;
        $review->save();
        return "data store successfully";

    }
    public function update(Request $request)
    {
        $review=Review::find($request->id);
        $review->delete();
        return "data deleted successfully";

    }
}

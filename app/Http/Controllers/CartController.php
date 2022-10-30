<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Whishlist;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request)
    {
      $product_id = $request->input('product_id');
      $product_qty = $request->input('product_qty');

      if(Auth::check())
      {
        $prod_check =Product::where('id',$product_id)->first();

        if($prod_check)
        {
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {
                return response()->json(['status' =>$prod_check->name." Already Added To Cart"]);
            }
            else{
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' =>$prod_check->name."Added To Cart"]); 
            }
        }
      }
      else
      {
        return response()->json(['status' =>"Login To Continue"]);
      }
    }

    public function viewcart()
    {
      $cartitems =Cart::where('user_id',Auth::id())->get();
      return view('frontend.cart',compact('cartitems'));
    }

    public function deleteproduct(Request $request)
    {
      if(Auth::check())
      {
      $prod_id= $request->input('prod_id');
      if(Cart::where('prod_id',$prod_id)->where('user_id', Auth::id())->exists())
      {
        $cartitem=Cart::where('prod_id',$prod_id)->where('user_id', Auth::id())->first();
        $cartitem->delete();
        return response()->json(['status'  =>"Product Delete from cart"]);
      }
    }
    else{
      return response()->json(['status'  =>"Login To continue"]);
    }
    }

    public function deletewhistlist(Request $request)
    {
      if(Auth::check())
      {
      $prod_id= $request->input('prod_id');
      if(Whishlist::where('prod_id',$prod_id)->where('user_id', Auth::id())->exists())
      {
        $wishitem=Whishlist::where('prod_id',$prod_id)->where('user_id', Auth::id())->first();
        $wishitem->delete();
        return response()->json(['status'  =>"Product Delete from Whistlist"]);
      }
    }
    else{
      return response()->json(['status'  =>"Login To continue"]);
    }
    }


    public function final()
    {
      return view('frontend.master');
    }

}

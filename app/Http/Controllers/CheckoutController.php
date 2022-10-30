<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
        foreach( $old_cartitems as $item)
        {
            if(Product::where('id',$item->prod_id)->where('qty',$item->prod_qty)->exists())
            {
             $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
             $removeItem->delete();
            }
        }
        $cartitems=Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
      $order = new Order();
      $order->user_id=Auth::id();
      $order->fname = $request->input('fname');
      $order->lname = $request->input('lname');
      $order->email = $request->input('email');
      $order->phone = $request->input('phone');
      $order->address1 = $request->input('address1');
      $order->address2 = $request->input('address2');
      $order->city = $request->input('city');
      $order->state = $request->input('state');
      $order->country = $request->input('country');
      $order->pincode = $request->input('pincode');

      $order->payment_mode = $request->input('payment_mode');
      $order->payment_id = $request->input('payment_id');
  
     $total = 0;
     $cartitems_total = Cart::where('user_id',Auth::id())->get();
     foreach($cartitems_total as $item)
     {
        $total += $item->products->selling_price;
     }
     $order->total_price =$total;



      $order->tracking_no = 'chandan'.rand(1111,9999);
      $order->save();


      $cartitems =Cart::where('user_id',Auth::id())->get();
      foreach($cartitems as $item)
      {
        OrderItem::create([
            'order_id'=>$order->id,
            'prod_id'=>$item->prod_id,
            'qty'=>$item->prod_qty,
            'price'=>$item->products->selling_price,
        ]);
        $product =Product::where('id',$item->prod_id)->first();
        $product->qty= $product->qty - $item->prod_qty;
        $product->update();
      }

      if(Auth::user()->address1 == NULL)
      {
      $user=User::where('id',Auth::id())->first();
      $user->name = $request->input('fname');
      $user->lname = $request->input('lname');
      $user->phone = $request->input('phone');
      $user->address1 = $request->input('address1');
      $user->address2 = $request->input('address2');
      $user->city = $request->input('city');
      $user->state = $request->input('state');
      $user->country = $request->input('country');
      $user->pincode = $request->input('pincode');
      $user->update();
      }

      $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $value) {
        $value->delete();
    }
    if($request->input('payment_mode') == "Paid By Razorpay")
    {
      return response()->json(['status'=>'Order placed Successfully']);
    }
      return redirect('/')->with('status','Order placed Successfully');
    }

    public function razorpaycheck(Request $request)
    {
     $cartitems = Cart::where('user_id',Auth::id())->get();
    //  dd($cartitems);
     $total_price=0;
     foreach($cartitems as $item)
     {
        $total_price +=$item->products->selling_price * $item->prod_qty;
     }
     $firstname = $request->input('firstname');
     $lastname = $request->input('lastname');
     $email = $request->input('email');
     $phone = $request->input('phone');
     $address1 = $request->input('address1');
     $address2 = $request->input('address2');
     $city = $request->input('city');
     $state = $request->input('state');
     $country = $request->input('country');
     $pincode = $request->input('pincode');


     return response()->json([
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'phone' => $phone,
        'address1' => $address1,
        'address2' => $address2,
        'city' => $city,
        'state' => $state,
        'country' => $country,
        'pincode' => $pincode,
        'total_price' =>$total_price
        
     ]);
    }
}

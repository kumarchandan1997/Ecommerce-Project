<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
 {
   // $product=Product::all();
    $product = Product::select('products.*','categories.id','categories.name')->
                                leftjoin('categories',function($join){
                                    $join->on('products.cate_id', '=' ,'categories.id');
                            })->get();
                         
    return view('admin.product.index',compact('product'));
 }

 public function add()
 {
    $category=Category::all();
    $attribute=ProductAttribute::all();
    return view('admin.product.add',compact('category','attribute'));
 }

 public function insert(Request $request)
 {
  $product = new Product();
if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('assets/uploads/product/', $filename);
            $product->image = $filename;
        }
  $product->name=$request->input('name');
  $product->cate_id=$request->input('cate_id');
  $product->slug=$request->input('slug');
  $product->small_description=$request->input('small_description');
  $product->description=$request->input('description');
  $product->original_price=$request->input('original_price');
  $product->selling_price=$request->input('selling_price');
  $product->status=$request->input('status')== TRUE ? '1':'0';
  $product->trending=$request->input('trending')== TRUE ? '1':'0';
  $product->meta_title=$request->input('meta_title');
  $product->qty=$request->input('qty');
  $product->tax=$request->input('tax');
  $product->meta_description=$request->input('meta_description');
  $product->meta_keywords=$request->input('meta_keywords');
     $product->save();
    

   // $product_attribute = new AttributeValue();
   //    $json = json_encode($request->input('value'));
   //    $product_attribute->value=$json;
   //    $product_attribute->product_id =$product->id;
   //  $value3=implode(',',$request->input('product_attribute_id'));
   // $product_attribute->product_attribute_id=$value3;
   // $product_attribute->save();


   foreach($request->value as $key=>$insert)
     {
       $saveRecord = [
              'value'  =>$request->value[$key],
               'product_id'  =>$product->id,
               //  'product_attribute_id'  =>isset($request->product_attribute_id[$key]),
                'product_attribute_id'  =>$request->product_attribute_id[$key],
         ];
      DB::table('attribute_values')->insert($saveRecord);
     }
   //  return redirect('/showproduct');


     return redirect('/products')->with('status','Product Added Successfully');
 }

 public function edit($id)
 {
     $product = Product::find($id);
     $category = Category::find($id);
     return view('admin.product.edit',compact('product','category'));
 }

 public function update(Request $request,$id)
 {
   $category = Category::find($id);
 
   if($request->hasfile('image'))
   {
      $path='assets/uploads/product/'.$category->image;
      if(File::exists($path))
      {
         File::delete($path);
      }
       $file = $request->file('image');
       $extention = $file->getClientOriginalExtension();
       $filename = time().'.'.$extention;
       $file->move('assets/uploads/category/', $filename);
       $category->image = $filename;
   }
   $category->name=$request->input('name');
   $category->cate_id=$request->input('cate_id');
   
  $category->slug=$request->input('slug');
  $category->description=$request->input('description');
  $category->status=$request->input('status')== TRUE ? '1':'0';
  $category->popular=$request->input('popular')== TRUE ? '1':'0';
  $category->meta_title=$request->input('meta_title');
  $category->meta_descrip=$request->input('meta_descrip');
  $category->meta_keywords=$request->input('meta_keywords');
     $category->update();
     return redirect('/categories')->with('status','Category updated Successfully');
}

public function admin_orders()
{
   $orders = Order::where('status','0')->get();
   // dd($orders);
   return view('admin.orders',compact('orders'));
}
public function view($id)
{
   $orders = Order::where('status','0')->where('id',$id)->first();
   //dd($orders);
   //$orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
   return view('admin.view_order',compact('orders'));
}

public function updateorder(Request $request ,$id)
{
   $orders = Order::find($id);
   $orders->status = $request->input('order_status');
   $orders->update();
   return redirect('admin_orders')->with('status','Order Updated Successfully');
}

public function alluser()
{
   $user=User::all();
   return view('admin.user',compact('user'));
}

public function viewuser($id)
{
   $user = User::find($id);
   return view('admin.view_user',compact('user'));
}

public function product_attribute()
{
   $product_attribute=ProductAttribute::all();
    return view('admin.product_attribute.product_attribute',compact('product_attribute'));
}

public function addattribute()
{
   return view('admin.product_attribute.addattribute');
}

public function store(Request $request)
 {
  $product_attribute = new ProductAttribute();

  $product_attribute->name=$request->input('name');
 
     $product_attribute->save();
     return redirect('/product-attribute')->with('status','Product Attribute Added Successfully');
 }


}

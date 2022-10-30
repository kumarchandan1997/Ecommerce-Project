<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
 public function index()
 {
   $category=Category::all();
    return view('admin.category.index',compact('category'));
 }
 public function add()
 {
    return view('admin.category.add');
 }
 public function insert(Request $request)
 {
  $category = new Category();
if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
  $category->name=$request->input('name');
  $category->slug=$request->input('slug');
  $category->description=$request->input('description');
  $category->status=$request->input('status')== TRUE ? '1':'0';
  $category->popular=$request->input('popular')== TRUE ? '1':'0';
  $category->meta_title=$request->input('meta_title');
  $category->meta_description=$request->input('meta_description');
  $category->meta_keywords=$request->input('meta_keywords');
     $category->save();
     return redirect('/categories')->with('status','Category Added Successfully');
 }

 public function edit($id)
 {
     $category = Category::find($id);
     return view('admin.category.edit',compact('category'));
 }

 public function update(Request $request,$id)
 {
   $category = Category::find($id);
 
   if($request->hasfile('image'))
   {
      $path='assets/uploads/category/'.$category->image;
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
public function delete($id)
{
   $category = Category::find($id);
   if($category->image)
   {
      $path='assets/uploads/category/'.$category->image;
      if(File::exists($path))
      {
         File::delete($path);
      }
   }  
   $category->delete();
   return redirect('/categories')->with('status','Category Deleted  Successfully');
}   


}

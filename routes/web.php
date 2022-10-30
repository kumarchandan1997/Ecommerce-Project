<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WhishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;



Auth::routes();
  Route::get('/',[FrontendController::class,'index']);

// Route::get('/categoey/{cate_slug}/{prod_slug}','Frontend\FrontendController@productview');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/category',[FrontendController::class,'category']);
Route::get('/category','Frontend\FrontendController@category');
Route::get('/view-category/{slug}','Frontend\FrontendController@view_category');
Route::get('category/{cate_slug}/{prod_slug}','Frontend\FrontendController@productview');
Route::get('/dashboard','Frontend\FrontendController@dashindex');
Route::get('/categoey','Frontend\FrontendController@productview');
Route::get('/hii','Frontend\FrontendController@hello');
Route::get('/','Frontend\FrontendController@index');
Route::get('/hello1',[HelloController::class,'hello1']);

Route::get('/whistlist',[WhishlistController::class,'whistlist']);


    Route::middleware(['auth','isAdmin'])->group(function(){
    // Route::get('/dashboard','Admin\FrontendController@index');
    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('delete/{id}','Admin\CategoryController@delete');
    Route::get('/edit/{id}','Admin\CategoryController@edit');
    Route::put('/update/{id}','Admin\CategoryController@update');
    Route::get('products','Admin\ProductController@index');
    Route::get('add-product','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('/edit/{id}','Admin\ProductController@edit');
    Route::put('/update/{id}','Admin\ProductController@update');
    Route::get('admin_orders','Admin\ProductController@admin_orders');
    Route::get('/view_order/{id}','Admin\ProductController@view');
    Route::put('/update-order/{id}','Admin\ProductController@updateorder');
    Route::get('users','Admin\ProductController@alluser');
    Route::get('/view_user/{id}','Admin\ProductController@viewuser');
    Route::get('product-attribute','Admin\ProductController@product_attribute');
    Route::get('add-product_attribute','Admin\ProductController@addattribute');
    Route::post('insert-product-attribute','Admin\ProductController@store');
});
Route::get('/category-product/{slug}','Frontend\FrontendController@category_product');

//cart
Route::post('addToCart',[CartController::class,'addproduct']);

Route::middleware(['auth'])->group(function(){
  
  Route::get('cart',[CartController::class,'viewcart']);
  Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
  Route::post('delete-whistlist-item',[CartController::class,'deletewhistlist']);
  
  Route::get('checkout',[CheckoutController::class,'index']);
  Route::post('place-order',[CheckoutController::class,'placeorder']);
  Route::get('my-orders',[UserController::class,'index']);
  Route::get('/view-order/{id}',[UserController::class,'view']);
  Route::post('proceed-to-pay',[CheckoutController::class,'razorpaycheck']);
  Route::post('/add-rating',[RatingController::class,'rating']);
  Route::get('add-review/{product_slug}/userreview',[RatingController::class,'addreview']);
  Route::post('/add-review',[RatingController::class,'store']);
  Route::get('/edit-review/{product_slug}/userreview',[RatingController::class,'edit']);
  Route::put('update-review',[RatingController::class,'update']);
});
Route::get('final',[CartController::class,'final']);


Route::post('addwhishlist',[WhishlistController::class,'store']);
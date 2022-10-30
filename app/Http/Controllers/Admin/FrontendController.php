<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Check;
use App\Models\Todo;

class FrontendController extends Controller
{
     public function index()
     {
         return view('admin.index');
     }
    // public function check()
    // {
    //     return view('check');
    // }
    // public function show()
    // {
    //     $check=Check::all();
    //     // dd($check);
    //     return view('check');
    // }
    // public function ajaxRequest()
    // {

    //     return view('welcome1');
    // }
    // public function ajaxRequestPost(Request $request)
    // {

    //     \DB::table('posts')->insert([
    //         'title' => $request->Code, //This Code coming from ajax request
    //         'details' => $request->Chief, //This Chief coming from ajax request
    //     ]);

    //     return response()->json(
    //         [
    //             'success' => true,
    //             'message' => 'Data inserted successfully'
    //         ]
    //     );
    // }



    

   

   
}

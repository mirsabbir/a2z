<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $latests = \App\Type::with('posts')->take(3)->get();
        $populars = \App\Type::with('popularPosts')->take(3)->get();
        return view('index')->with(['latests'=>$latests,'populars'=>$populars]);
    }
    public function search(Request $request){
        
    }
    public function type(Request $request){
        
    }
    public function typePost(Request $request){
        
    }
    
}

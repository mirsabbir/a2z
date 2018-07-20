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
    public function type(Request $request,\App\Type $type){
        $latests = \App\Type::with('posts')->take(3)->get();
        $populars = \App\Type::with('popularPosts')->take(3)->get();
        $tp = $type->name;
        $posts = $type->posts()->paginate(10);
        return view('type')->with(['posts'=>$posts,'latests'=>$latests,'populars'=>$populars,'type'=>$tp]);
    }
    public function typePost(Request $request,\App\Type $type,\App\Post $post){
        $latests = \App\Type::with('posts')->take(3)->get();
        $populars = \App\Type::with('popularPosts')->take(3)->get();
        $tp = $type->name;
        $related = $type->posts()->orderBy('count','desc')->take(6)->get();
        return view('post')->with(['post'=>$post,'latests'=>$latests,'populars'=>$populars,'type'=>$tp,'relateds'=>$related]);
    
    }
    
}

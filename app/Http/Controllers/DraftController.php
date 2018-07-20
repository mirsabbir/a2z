<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DraftController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts = \App\Draft::all();
        $populars = \App\Type::with('popularPosts')->take(3)->get();
        return view('editor.drafts')->with(['populars'=>$populars,'drafts'=>$drafts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $populars = \App\Type::with('popularPosts')->take(3)->get();
        return view('editor.new')->with(['populars'=>$populars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * validate the request
         */

         /**
          * replace the tables
          */


          

        if($request->save){
            
            $draft = new \App\Draft;
            $draft->title = $request->title;
            $draft->slug = $request->slug;
            $draft->body = $request->content;
            
            $draft->type_id = $request->type;
            

            $name = $request->file('image')->getClientOriginalName();
            $draft->image = $request->file('image')->store('public');

            $image = \Storage::url($draft->image);

            
            $draft->image = $image;

            $draft->save();
            
            return redirect('/editor/drafts');

            
        } else if($request->preview){
            $draft = new \App\Draft;
            $draft->title = $request->title;
            $draft->slug = $request->slug;
            $draft->body = $request->content;
            
            $draft->type_id = $request->type;
            

            $name = $request->file('image')->getClientOriginalName();
            $draft->image = $request->file('image')->store('public');

            $image = \Storage::url($draft->image);

            
            $draft->image = $image;

            $populars = \App\Type::with('popularPosts')->take(3)->get();
            return view('editor.preview')->with(['populars'=>$populars,'draft'=>$draft]);
            
        } else {

            $draft = new \App\Post;
            $draft->title = $request->title;
            $draft->slug = $request->slug;
            $draft->body = $request->content;
            
            
            

            $name = $request->file('image')->getClientOriginalName();
            $draft->image = $request->file('image')->store('public');

            $image = \Storage::url($draft->image);

            
            $draft->image = $image;
            
            $draft->count = 0;
            \App\Type::find($request->type)->first()->posts()->save($draft);

            
            
            $url = \App\Type::find($request->type)->name.'/'.$draft->slug;

            return redirect($url);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Draft $draft)
    {   $populars = \App\Type::with('popularPosts')->take(3)->get();
        return view('editor.draft')->with(['populars'=>$populars,'draft'=>$draft]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Draft $draft)
    {
        $populars = \App\Type::with('popularPosts')->take(3)->get();
        return view('editor.edit')->with(['populars'=>$populars,'draft'=>$draft]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Draft $draft)
    {
        $draft->delete();
        return redirect('/editor/drafts');
    }
}

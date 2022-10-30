<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Store;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $art = new Store;
        $arts = $art->find($id);

        return view('post.article', [
            'arts' => $arts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Poster = new Post;
        $Poster = $request->validate([
            'content'=>'required|max:10000',
            // 'image'=>'image|max:1024'
        ]);
        $Poster = new Post;
        
        $Poster->store_id = $request->store_id;

        $Poster->content = $request->content;
    
        $Poster->user_id = auth()->user()->id;

        if (request('image')){
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('storage/images', $name);
            $Poster->image = $name;
        }

        $Poster->save();
        return view('complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Post $post)
    {
        
        $user = auth()->user()->id;

        $postedit = Post::with('store')->find($id);
        // dd($postedit);
        return view('edit_article', compact('postedit','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $record = Post::find($id);
        
        $record->content = $request->content;

        $record->store_id = $request->store_id;

        if (request('image')){
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('storage/images', $name);
            $record->image = $name;
        }

        $record->save();
        return view('edit_complete');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $post = Post::find($id);
        if (auth()->user()->id = $post->user_id) {
            $post->delete();
            
            }
            
        return redirect()->route('articleAll')->with('message', '投稿を削除しました');

    }

        
}

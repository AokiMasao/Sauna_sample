<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([

            'name'=>'required|max:255',
            'content'=>'required|max:10000',
            'address'=>'required',
            'open_time'=>'required',
            'close_time'=>'required',
            'price'=>'required',
            'sauna_temperature'=>'required',
            'wb_temperature'=>'required',
            'eat_space'=>'required',
            
        ]);

        $post = new Store;
        $post->name = $request->name;
        $post->address = $request->address;
        $post->open_time = $request->open_time;
        $post->close_time = $request->close_time;
        $post->price = $request->price;
        $post->sauna_temperature = $request->sauna_temperature;
        $post->wb_temperature = $request->wb_temperature;
        $post->content = $request->content;
        $post->eat_space = $request->eat_space;
        $post->user_id = auth()->user()->id;
        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
             // 日時追加
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $post->image = $name;
        }
        $post->save();
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
        $colum = new Store;
        $store = $colum->where('id' ,'=' ,$id)->get()->toArray();
// dd($store);
        return view('post/show',[
            'stores' => $store,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = auth()->user()->id;

        $editmystore = Store::find($id);

        return view('edit_mystore', compact('editmystore','user'));
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
        $record = Store::find($id);
        
        $record->name = $request->name;
        $record->address = $request->address;
        $record->open_time = $request->open_time;
        $record->close_time = $request->close_time;
        $record->price = $request->price;
        $record->sauna_temperature = $request->sauna_temperature;
        $record->wb_temperature = $request->wb_temperature;
        $record->eat_space = $request->eat_space;
        $record->content = $request->content;

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
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\Store;
use App\Models\User;
use App\Models\Like;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       
            $user = auth()->user()->id; //管理者のuser_id
            $role = auth()->user()->role;
            $stores = Store::where('user_id', $user)->get(); //登録した店

            $all_reviews = [];
            $likes = [];
            foreach($stores as $st) {
                // echo $st->id;
                $reviews = Post::where('store_id', $st->id)->get()->toArray();
                $all_reviews[$st->name] = $reviews; //登録した店に対するユーザーの投稿

                if($role == 1){
                    $store_like[$st->id] = $reviews;  // ストアテーブルのidをキーとした施設ごとの投稿
                }
           
                // var_dump($reviews);
                foreach($reviews as $key=>$value){
                        
                  
                    $counts = Like::where('post_id', $value['id'])->count();
                  
                    if(isset($likes[$st->id])) {
                        $likes[$st->id] +=  $counts;
                    } else {
                        $likes[$st->id] = $counts;
                    }
                }
            }
       
            
          
                    

            $posts = Post::select('stores.name','store_id','posts.id', 'posts.created_at','posts.content','posts.user_id','posts.image')->join('stores','stores.id','=','posts.store_id')->latest()->paginate(5);
          
            $like_model = new Like;



            return view('toppage', compact('posts','like_model','all_reviews','user'));
            
        
    }

    public function mypage(){


            // $user=auth()->user()->id;
            // $Mypost=Post::select('stores.name','store_id','posts.created_at','posts.content','posts.user_id','posts.id')->join('stores','stores.id','=','posts.store_id')->where('posts.user_id','=',$user)->get();

            // dd($Mypost['store_id']);
            return view('Mypage');
            

    }

    public function articleall() {

            $user=auth()->user()->id;
            $Mypost=Post::select('stores.name','store_id','posts.created_at','posts.content','posts.user_id','posts.id','posts.image')->join('stores','stores.id','=','posts.store_id')->where('posts.user_id','=',$user)->latest()->paginate(5);

            // dd($Mypost['store_id']);
            return view('article_all', compact('Mypost', 'user'));

    }

    public function ajaxlike(Request $request) {

        $id = auth()->user()->id;
        $post_id = $request->post_id;
        $post = Post::findOrFail($post_id);
        $like = new Like;
        
        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like->store_id = $request->store_id;
            $like->post_id = $request->post_id;
            $like->user_id = $id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);

        }


        public function search(Request $request) {

            $name = $request->input('name');
            $address = $request->input('address');
            $price = $request->input('price');
            $sauna_temperature = $request->input('sauna_temperature');
            $sauna_temperature2 = $request->input('sauna_temperature2');

            $query = Store::query();

            $price_list = [
                [0, 1000],
                [1000, 2000],
                [2000, 3000],
                [3000, 4000],
                [4000, 5000],
            ];

           


            if(!empty($name)) {
                $query->where('name', 'LIKE', "%{$name}%");
            }

            if(!empty($address)) {
                $query->where('address', 'LIKE', "%{$address}%");
            }

            if(!empty($price)) {
              
                $query->whereBetween('price', $price_list[$price-1]);
            }
            if(!empty($sauna_temperature2)) {
                $query->where('sauna_temperature','<=',$sauna_temperature2);
            }
            if(!empty($sauna_temperature)) {
                $query->where('sauna_temperature','>=',$sauna_temperature);
            }



            $items = $query->get();
            return view('Search', compact('items'));
        
        }


        public function saunaregister() {

            return view('sauna_register');
        }

        public function stuff(Request $request) {

            $stuff = new User;
            $stuff->name = $request->name;
            $stuff->email = $request->email;
            $stuff->password = Hash::make($request->password);
            $stuff->role = 1;


            $stuff->save();
            return redirect('/login');
        }


        public function storeAll() {

            $mise = Store::select('stores.id','stores.name','stores.address','stores.content','stores.open_time','stores.close_time','stores.price','stores.sauna_temperature','stores.wb_temperature')->latest()->paginate(10);

            return view('store',compact('mise'));
        }

        public function likeall() {

            $user = auth()->user()->id;
            $likeposts = Post::select('stores.name','posts.store_id','posts.user_id','posts.content','posts.image','posts.created_at')->join('likes','post_id' ,'=','posts.id')->join('stores','stores.id','=','posts.store_id')->where('likes.user_id','=',$user)->latest()->paginate(5);

            return view('likeall', compact('likeposts'));

        }

        public function mystoredetail() {

            $user = auth()->user()->id;

            $mystoredetail = Store::select('stores.id','stores.user_id','stores.name','stores.address','stores.content','stores.open_time','stores.close_time','stores.price','stores.sauna_temperature','stores.wb_temperature','stores.image','stores.eat_space')->where('stores.user_id','=',$user)->get();
            
            $role = auth()->user()->role;
            $stores = Store::where('user_id', $user)->get(); //登録した店

            $all_reviews = [];
            $likes = [];
            foreach($stores as $st) {
                // echo $st->id;
                $reviews = Post::where('store_id', $st->id)->get()->toArray();
                $all_reviews[$st->name] = $reviews; //登録した店に対するユーザーの投稿

                if($role == 1){
                    $store_like[$st->id] = $reviews;  // ストアテーブルのidをキーとした施設ごとの投稿
                }
           
                // var_dump($reviews);
           
                foreach($reviews as $key=>$value){
                        
                  
                    $counts = Like::where('post_id','=', $value['id'])->count();
                    
                   
            
                    if(isset($likes[$st->id])) {
                        $likes[$st->id] +=  $counts;
                    } else {
                        $likes[$st->id] = $counts;
                    }
                }
               
            }
             
            
           
  

            

            
            return view('mystoredetail', compact('mystoredetail'));
        }

}

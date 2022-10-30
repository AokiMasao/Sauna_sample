@extends('layouts.app')
@section('content')

@can ('isStuff')

<header class="bg-warning py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">No-Sauna-No-Life</h1>
                            <p class="lead text-white mb-4">自分達のサウナ施設を登録して多くの人に知ってもらおう！</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-info btn-lg px-4 me-sm-3" href="{{ route('post.create') }}">施設の登録をする</a>
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('Mystore.detail')}}">施設登録情報</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">こんなレビューが投稿されています。</h2>
                </div>

@foreach ($all_reviews as $ar)
@foreach($ar as $a)
<div class="container-fluid mt-5">
        <div class="col-md-5 mx-auto" style="margin-left:50px;">
            <div class="card">
                <div class="card-header">
                    <div class="media align-items-center">
                        <div class="media-body ml-3">  
                            <div class="text-muted small"> </div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div></div>
                            <div><strong>  </strong> </div>
                        </div>
                    </div>
                </div>

                
                <div class="card-body">
                  
                    <p>  {{ $a['content'] }}</p>

                    @if(!empty($a['image']))
                        <img src="{{ asset('storage/images/'.$a['image'])}}" 
                            class="img-fluid mx-auto d-block mt-5" style="height:200px; width:300px;">
                   
                  @endif
                
                </div>
            </div>
        </div>
    </div>

    @endforeach
@endforeach
@endcan


@can('isUser')
        <header class="bg-warning py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">No-Sauna-No-Life</h1>
                            <p class="lead text-white mb-4">日々のサウナが楽しみ！このサウナをもっと広めたい！皆さんのレビューが他の人たちのサウナライフをもっとよくする。様々な施設のレビューから新たな発見やお気に入りの場所を見つけよう！</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('Mypage') }}">マイページ</a>
                                <a class="btn btn-info btn-lg px-4 me-sm-3" href="{{ route('storeall') }}">施設を見る</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

           
        
     
     

        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">新着サ活レビュー</h2>
                    <p class="lead mb-0">気になったら店舗詳細へ</p>
                </div>

                <div class="search">
                    <form action="{{route('Search')}}" method="GET">
                        <div class="form-group ">
                            <div>
                                <label for="">施設名
                            <div>
                                <input type="text" name="name" value="" style="width: 20rem;" class="form-control">
                        </div>
                                </label>
                    </div>
                <div>
                                <label for="">住所
                            <div>
                                <input type="text" name="address" value="" style="width: 20rem;" class="form-control">
                            </div>
                                </label>
                </div>

                <div>
                    料金
                    <div>
                    <select name="price" style="width: 20rem;" class="form-control">
                        <option selected="selected" value>選択してください</option>
                        <option value="1">0~1000</option>
                        <option value="2">1000~2000</option>
                        <option value="3">2000~3000</option>
                        <option value="4">3000~4000</option>
                        <option value="5">4000~5000</option>
                    </select>
                        
                    </div>
                </div>
                <div>
                    サウナ温度
                    <div>
                    <input type="number" step=10 max=130 min=50 style="width: 20rem;" name="sauna_temperature"  class="form-control"  placeholder="最低温度" >
                    <input type="number" step=10 max=130 min=50 style="width: 20rem;" name="sauna_temperature2"  class="form-control" placeholder="最高温度">

                      
                    </div>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary btn-lg px-2 me-sm-2 mt-2" value="検索">
                </div>

               
   


@foreach ($posts as $post)
<div class="container-fluid mt-5">
        <div class="col-md-5 mx-auto" style="margin-left:50px;">
            <div class="card">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-3">  {{ $post->name }} 
                        <a href="{{route('post.show', ['post' => $post['store_id']] )}}">店舗詳細</a>
                            <div class="text-muted small"> {{ $post->user->name }}</div>
                        </div>

                        @if($like_model->like_exist(auth()->user()->id,$post->id))
                            <p class="favorite-marke">
                            <a class="js-like-toggle loved" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{$post->likes_count}}</span>
                            </p>
                            @else
                            <p class="favorite-marke">
                            <a class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{$post->likes_count}}</span>
                            </p>
                            @endif

                        <div class="text-muted small ml-3">
                            <div></div>
                            <div><strong> {{$post->created_at->diffForHumans()}} </strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <p> {{$post->content}} </p>
                    @if($post->image)
                <img src="{{ asset('storage/images/'.$post->image)}}" 
            class="img-fluid mx-auto d-block" style="height:200px;">
            @endif
                </div>
            </div>
        </div>
    </div>


@endforeach
<div class="" style="margin-left: 44%; margin-top: 50px;">
    {{ $posts->links('pagination::bootstrap-4') }}
    </div>
@endcan





        
        <!-- Pricing section-->
        
                        
    <script>
$(function () {
    var like = $('.js-like-toggle');
    var likePostId;
    
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        console.log(likePostId);
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/like/posts',  //routeの記述
                type: 'post', //受け取り方法の記述（GETもある）
                data: {
                    'post_id': likePostId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved');
                console.log('success') 
                console.log(data)
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.postLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
    </script>

@endsection
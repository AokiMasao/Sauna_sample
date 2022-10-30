@extends('layouts.app')
@section('content')

@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

<div class="card text-center">
  <div class="card-header">
    <h3>過去の投稿を振り返ろう</h3>
  </div>
  <div class="card-body" style="background-color:#6495ED;">
    <h5 class="card-title">修正したい場合は投稿編集へ</h5>
    <p class="card-text">店舗詳細から施設の情報を再確認できます。</p>
    ※<a href="#" class="btn btn-danger">削除</a>する場合はクリックした後に”はい”を選択して下さい。
  </div>
 
</div>

@foreach($Mypost as $post)
<div class="container-fluid mt-5">
        <div class="col-md-5 mx-auto" style="margin-left:50px;">
            <div class="card" >
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-3">  {{ $post->name }} 
                            <a href="{{route('post.show', ['post' => $post['store_id']] )}}">店舗詳細</a>
                            <a href="{{route('article.edit', ['article' => $post['id']] )}}">投稿編集</a>
                            <form method="post" action="{{route('article.destroy', ['article' => $post['id']] )}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="float:right;" onClick="return confirm('本当に削除しますか？');">削除</button>
                            </form>
                                <div class="text-muted small"> </div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div></div>
                            <div><strong>  </strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
    {{ $Mypost->links('pagination::bootstrap-4') }}
    </div>





@endsection

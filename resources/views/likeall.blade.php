@extends('layouts.app')
@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="text-center">いいねした一覧</h3>
  </div>
  <div class="card-body" style="background-color: #EEFFFF;">
    <h5 class="card-title text-center">店舗詳細からサウナの温度や営業時間等の確認もできます。</h5>
  </div>
</div>

@foreach($likeposts as $likepost)
<div class="container-fluid mt-5">
        <div class="col-md-5 mx-auto" style="margin-left:50px;">
            <div class="card">
                <div class="card-header">
                    <div class="media flex-wrap w-100 align-items-center">
                        <div class="media-body ml-3">  {{$likepost->name}}
                        <a href="{{route('post.show', ['post' => $likepost['store_id']] )}}">店舗詳細</a>
                            <div class="text-muted small"> </div>
                        </div>

                        <div class="text-muted small ml-3">
                            <div></div>
                            <div><strong>  </strong> </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <p> {{$likepost->content}}</p>
                    @if($likepost->image)
                <img src="{{ asset('storage/images/'.$likepost->image)}}" 
            class="img-fluid mx-auto d-block" style="height:200px;">
            
            @endif
                </div>
            </div>
        </div>
    </div>

@endforeach

                <div class="" style="margin-left: 44%; margin-top: 50px;">
                    {{ $likeposts->links('pagination::bootstrap-4') }}
                </div>


@endsection
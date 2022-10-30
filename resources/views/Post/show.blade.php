@extends('layouts.app')
@section('content')

<div class="card-header text-center">
    <h2>{{ $stores[0]['name']}}</h2>
  </div>
    <div class="" style="margin-left:63%;">
      <a href="{{route('article.create', ['article' => $stores[0]['id']] )}}"><h4>+レビューを投稿する</h4></a>
    </div>
<div class="card mx-auto"  style="width: 50rem;">
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item">住所：{{$stores[0]['address']}}</li>
    <li class="list-group-item">営業開始：{{ $stores[0]['open_time']}}</li>
    <li class="list-group-item">営業終了：{{$stores[0]['close_time']}}</li>
    <li class="list-group-item">料金：{{$stores[0]['price']}}</li>
    <li class="list-group-item">サウナ温度：{{$stores[0]['sauna_temperature']}}</li>
    <li class="list-group-item">水風呂温度：{{$stores[0]['wb_temperature']}}</li>
    <li class="list-group-item">食事処有無：
        @if($stores[0]['eat_space'] === 1)
            有
        @else
            無
        @endif
    </li>
  </ul>
</div>
      <div class="card-body mx-auto" style="width: 50rem;">
    <div class="card" >
      <div class="card-body">
        <h5 class="card-title">補足事項</h5>
        <p class="card-text">{{$stores[0]['content']}}</p>
      </div>
    </div>
  </div>


                  <div class="d-flex justify-content-around" style="">
                  @if(!empty($stores[0]['image']))
                        <img src="{{ asset('storage/images/'.$stores[0]['image'])}}" 
                            class="ml-5" style="height:400px; width:400px; margin-top:25px; margin-left:250px;">

                  @endif
<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDe3UrkJjGECh9eU-qcT-rtCUAuP_hPKBE&q={{$stores[0]['address']}}" style="margin-top:25px; margin-right:250px;" height=400px; width=400px;>

  </div>

@endsection




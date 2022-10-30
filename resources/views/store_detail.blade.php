@extends('layouts.app')
@section('content')

@foreach($stores as $store)

<div class="card-header text-center">
    <h2>{{ $store['name']}}</h2>
  </div>
    <div class="" style="margin-left:63%;">
      <a href="{{route('article.create', ['article' => $store['id']] )}}"><h4>+レビューを投稿する</h4></a>
    </div>
<div class="card mx-auto"  style="width: 50rem;">
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item">住所：{{$store['address']}}</li>
    <li class="list-group-item">営業開始：{{ $store['open_time']}}</li>
    <li class="list-group-item">営業終了：{{$store['close_time']}}</li>
    <li class="list-group-item">料金：{{$store['price']}}</li>
    <li class="list-group-item">サウナ温度：{{$store['sauna_temperature']}}</li>
    <li class="list-group-item">水風呂温度：{{$store['wb_temperature']}}</li>
    <li class="list-group-item">食事処有無：
        @if($store['eat_space'] === 1)
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
        <p class="card-text">{{$store['content']}}</p>
      </div>
    </div>
  </div>
                <div class="d-flex justify-content-around" style="">
                  @if(!empty($store['image']))
                        <img src="{{ asset('storage/images/'.$store['image'])}}" 
                            class="ml-5" style="height:400px; width:400px; margin-top:25px; margin-left:250px;">

                  @endif
<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDe3UrkJjGECh9eU-qcT-rtCUAuP_hPKBE&q={{$store['address']}}" style="margin-top:25px; margin-right:250px;" height=400px; width=400px;>

  </div>


                  @endforeach
@endsection
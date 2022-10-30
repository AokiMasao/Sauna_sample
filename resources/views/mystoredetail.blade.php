@extends('layouts.app')
@section('content')
@foreach($mystoredetail as $mystore)

<div class="card-header text-center" style="margin-top:20px;">
    <h2>{{ $mystore['name']}}</h2>
  </div>
<!-- <div class="">
 <h5 style="font-size:20px;
            margin-left:320px;
	          line-height:0.95em;
	          font-weight:bold;
	          color: #03A9F4;
	          text-shadow: 
		        0.04em 0.02em 0 #B0BEC5, 
		        0.08em 0.05em 0 rgba(0, 0, 0, 0.6);">投稿に対してのいいねの数：件</h5>
</div> -->


    <div class="" style="margin-left:67%;">
      <a href="{{ route('post.edit', ['post' => $mystore['id']] )}}"><h4>施設情報の変更</h4></a>
    </div>
<div class="card mx-auto"  style="width: 50rem;">
  
  <ul class="list-group list-group-flush">
    <li class="list-group-item">住所：{{ $mystore['address']}}</li>
    <li class="list-group-item">営業開始：{{ $mystore['open_time']}}</li>
    <li class="list-group-item">営業終了：{{ $mystore['close_time']}}</li>
    <li class="list-group-item">料金：{{ $mystore['price']}}</li>
    <li class="list-group-item">サウナ温度：{{ $mystore['sauna_temperature']}}</li>
    <li class="list-group-item">水風呂温度：{{ $mystore['wb_temperature']}}</li>
    <li class="list-group-item">食事処有無：
        @if($mystore['eat_space'] === 1)
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
        <p class="card-text">{{ $mystore['content']}}</p>
      </div>
    </div>
  </div>

         @if(!empty($mystore['image']))
              <img src="{{ asset('storage/images/'.$mystore['image'])}}" 
                    class="img-fluid mx-auto d-block mt-5 " style="height:200px; width:500px;">
        @endif

@endforeach    

@endsection
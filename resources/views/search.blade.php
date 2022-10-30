@extends('layouts.app')
@section('content')

@foreach($items as $item)

<div class="card mx-auto mt-3" style="width: 30rem;">
  <h5 class="card-header">施設名：{{$item->name}}</h5>
  <div class="card-body">
    <p class="card-text">住所：{{$item->address}}</p>
    <p class="card-text">料金：¥{{$item->price}}</p>
    <p class="card-text">サウナ温度：{{$item->sauna_temperature}}</p>
    <a href="{{route('post.show', ['post' => $item['id']] )}}" class="btn btn-primary">店舗詳細</a>
  </div>
</div>

<!-- <ul class="list-group list-group-flush">
    <li class="list-group-item">施設名：{{$item->name}}<a href="{{route('post.show', ['post' => $item['id']] )}}">店舗詳細</a></li>
    <li class="list-group-item">住所：{{$item->address}}</li>
    <li class="list-group-item">料金：{{$item->price}}</li>
    <li class="list-group-item">サウナ温度：{{$item->sauna_temperature}}</li>
 
    </li>
  </ul> -->
@endforeach

@endsection
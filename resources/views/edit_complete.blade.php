@extends('layouts.app')
@section('content')

@can('isStuff')
<div class="card">
  <div class="card-body text-cneter mx-auto">
    <h4>施設情報を編集しました！</h4>
    <a href="{{(route('home'))}}"><h2>トップページへ戻る</h2></a>
  </div>
</div>
@endcan


@can('isUser')
<div class="card">
  <div class="card-body text-cneter mx-auto">
    <h4>投稿を編集しました！</h4>
    <a href="{{(route('home'))}}"><h2>トップページへ戻る</h2></a>
  </div>
</div>
@endcan

@endsection
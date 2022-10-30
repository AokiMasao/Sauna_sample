@extends('layouts.app')
@section('content')




<div class="card text-center bg-info">
  <div class="card-header">
    <h4>マイページ</h4>
  </div>
  <div class="card-body">
    <h5 class="card-title">過去の自分の投稿を見る</h5>
    <p class="card-text">自分が投稿した内容を見返して思い出や楽しみを振り返ろう！</p>
    <a href="{{ route('articleAll') }}" class="btn btn-primary">投稿一覧</a>
  </div>
</div>

<div class="card text-center bg-warning" style="margin-top:50px;">

  <div class="card-body">
    <h5 class="card-title">いいねした施設を見る</h5>
    <p class="card-text">お気に入り保存した投稿を見て次に行くところを決めよう！</p>
    <a href="{{ route('Like')}}" class="btn btn-primary">いいね一覧</a>
  </div>
</div>

@endsection


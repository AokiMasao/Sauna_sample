@extends('layouts.app')
@section('content')
<!-- <div class="row">
    <div class="col-md-10 mt-6"> -->
        <div class="card-body">
            <h1 class="mt4 text-center">新規投稿</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
            @endforeach
                    </ul>
            </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form method="post"  action="{{route('article.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">施設名</label>
                    <label for="title">{{ $arts['name']}}</label>
                    <input type="hidden"  name="store_id" class="form-control mx-auto" id="title" value="{{ $arts['id']}}">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="body">本文</label>
                    <textarea name="content" style="width: 50rem;" class="form-control mx-auto" id="body" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group text-center" style="font-size: 1rem;">
                    <label for="image">画像 </label>
                    <div class="mx-auto">
                        <input id="image" type="file" name="image">
                    </div>
                </div>
                <div class="col text-center mt-4">
                <button type="submit" class="btn btn-success">送信する </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

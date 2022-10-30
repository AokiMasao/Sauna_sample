@extends('layouts.app')
@section('content')

<div class="card-body">
            <h1 class="mt4 text-center">投稿編集</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
            @endforeach
                    </ul>
            </div>
            @endif
            @if (session('Message'))
                <div class="alert alert-success">{{session('Message')}}</div>
            @endif
            <form method="post"  action="{{route('article.update',['article' => $postedit['id']])}}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            
                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title"></label>
                    <label for="title">{{ $postedit->store->name}}</label>
                    <input type="hidden"  name="store_id" class="form-control mx-auto" id="title" value="{{$postedit['store_id']}}">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="body">本文</label>
                    <textarea name="content" style="width: 50rem;" class="form-control mx-auto" id="body" cols="30" rows="10">{{$postedit->content}}</textarea>
                </div>

                <div class="form-group text-center" style="font-size: 1rem;">
                    <label for="image">画像 </label>
                    <div class="mx-auto">
                    @if($postedit->image)
                        <img src="{{ asset('storage/images/'.$postedit->image)}}" 
                        class="img-fluid mb-5 mx-auto d-block" style="height:200px;">
                        @endif
                        <input id="image" type="file" name="image">
                    </div>
                </div>
                <div class="col text-center mt-4">
                <button type="submit" class="btn btn-success">送信する </button>
                </div>
            </form>
        </div>
    </div>
</div

@endsection
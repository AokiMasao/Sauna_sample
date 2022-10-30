@extends('layouts.app')
@section('content')
<!-- <div class="row"> -->
    <!-- <div class="col-md-10 mt-6"> -->
        <div class="card-body">
            <h1 class="mt4 mb-4 text-center">登録情報変更フォーム</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            @if(empty($errors->first('image')))
                            <li>画像ファイルがあれば、再度、選択してください。</li>
                            @endif
                        </ul>
                    </div>
                @endif
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form method="post" action="{{ route('post.update',['post' => $editmystore['id']] )}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">施設名</label>
                    <input type="text" style="width: 50rem;" name="name" class="form-control mx-auto " value="{{$editmystore->name}}" id="title" placeholder="施設名を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">住所</label>
                    <input type="text" style="width: 50rem;" name="address" class="form-control mx-auto" value= "{{ $editmystore->address}}"  placeholder="住所を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">営業開始時間</label>
                    <input type="time" style="width: 50rem;" name="open_time" class="form-control mx-auto" value= "{{ $editmystore->open_time}}"  placeholder="営業開始時間を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">営業終了時間</label>
                    <input type="time" style="width: 50rem;" name="close_time" class="form-control mx-auto" value= "{{ $editmystore->close_time}}"  placeholder="営業終了時間を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">料金</label>
                    <input type="text" style="width: 50rem;" name="price" class="form-control mx-auto" value= "{{ $editmystore->price}}"  placeholder="料金を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">サウナ温度</label>
                    <input type="number"step=10 max=130 min=50 style="width: 50rem;" name="sauna_temperature" class="form-control mx-auto" value= "{{ $editmystore->sauna_temperature}}"  placeholder="サウナ温度を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">水風呂温度</label>
                    <input type="number" step=5 max=30 min=5 style="width: 50rem;" name="wb_temperature" class="form-control mx-auto" value= "{{ $editmystore->wb_temperature}}"  placeholder="水風呂温度を入力">
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="title">食事処有無</label>
                        <input type="radio" name="eat_space" value="1" checked="checked">有
                        <input type="radio" name="eat_space" value="0">無
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
                    <label for="body">補足事項</label>
                    <textarea name="content" style="width: 50rem;" class="form-control mx-auto" id="body" cols="30" rows="10"> {{ $editmystore->content}}</textarea>
                </div>

                <div class="form-group text-center" style="font-size: 1.25rem;">
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
<!-- </div> -->
@endsection
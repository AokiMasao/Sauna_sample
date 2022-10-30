@extends('layouts.app')
@section('content')

<section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">登録店舗一覧</h2>
                    <p class="lead mb-0">意外とお近くにあるかも</p>
                </div>
                     @foreach($mise as $omise)
                        <!-- <div class="col-sm-6"> -->
                            <div class="card col-md-5 mt-5 mx-auto">
                            <div class="card-body">
                                <h5 class="card-title">{{ $omise->name}}</h5>
                            <ul>
                                <li class="list-unstyled">サウナ温度　{{ $omise->sauna_temperature}}℃</li>
                                <li class="list-unstyled">水風呂温度　{{ $omise->wb_temperature}}℃</li>
                                <li class="list-unstyled">料金 ¥{{ $omise->price}}</li>
                            </ul>
                                <a href="{{route('storedetail.show', ['storedetail' => $omise['id']] )}}" class="btn btn-primary">店舗詳細</a>
                            </div>
                            </div>
                            
                    @endforeach
                    <div class="" style="margin-left: 44%; margin-top: 50px;">
                        {{ $mise->links('pagination::bootstrap-4') }}
                    </div>
@endsection
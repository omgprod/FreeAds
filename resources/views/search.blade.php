@extends('layouts.app')
@extends('layouts.flash')

@section('content')
    <div id="refresh-h-page"></div>
    <div id="home-refresh" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($ads as $ad)
                    <div class="card" style="margin-bottom: 10px">
                        <div class="card-header d-flex justify-content-center">
                            <b>Ad : </b> {{ $ad['id'] }} <b> | Category : </b> {{ $ad['category'] }}<b> | Posted at : </b>{{ $ad['created_at'] }}</div>
                        <div class="card-body">
                            @if (!empty($ad['picture1']))
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ $ad['picture1'] }}" height="400"
                                                 width="200" alt="First slide">
                                        </div>
                                        @if (!empty($ad['picture2']))
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ $ad['picture2'] }}" height="400"
                                                     width="200" alt="First slide">
                                            </div>
                                        @endif
                                        @if (!empty($ad['picture3']))
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ $ad['picture3'] }}" height="400"
                                                     width="200" alt="First slide">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <p><b>Title: </b> {{ $ad['title'] }}</p>
                            <p><b>Price: </b>{{ $ad['price'] . " euro" }}</p>
                            <p><b>Content: </b>{{ $ad['content'] }}</p>
                            <p><b>Posted by: </b>{{ $ad->user->name }}</p>
                            <a href="messages"><button class="btn btn-dark">Send Text</button></a>
                            <button class="btn btn-dark">like</button>
                            <button class="btn btn-dark" hidden>Dislike</button>
                            <a class="like" href="#"><i class="far fa-heart fa-clickable" ></i></a>
                            <a class="dislikes"><i class="fas fa-heart fa-clickable" hidden></i></a>
                            <br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{$ads->render()}}
@endsection

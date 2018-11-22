@extends('layouts.app')
@extends('layouts.flash')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($ads as $ad)
                    <div class="card">
                        <div class="card-header">Edit your Ad {{$ad['id']}}</div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{route('ad.update')}}">
                                @csrf
                                @method('PATCH')
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
                                    </div><br>
                                @endif
                                <input type="text" name="picture1" placeholder="Link pictures 1" style="margin-bottom: 10px"/>
                                <input type="text" name="picture2" placeholder="Link pictures 2" style="margin-bottom: 10px"/>
                                <input type="text" name="picture3" placeholder="Link pictures 3" style="margin-bottom: 10px"/>
                                <p><b>Title: </b>{{ $ad['title'] }}</p>
                                <input type="text" name="title" placeholder="Title" style="margin-bottom: 10px"/>
                                <P><b>Content: </b>{{ $ad['content'] }}</p>
                                <textarea name="content" cols="50" rows="10" placeholder="Describe your ad."
                                          style="margin-bottom: 10px"></textarea>
                                <P><b>Price: </b>{{ $ad['price'] }}</p>
                                <input type="text" name="price" placeholder="Price" style="margin-bottom: 10px"/>
                                <P><b>Category: </b>{{ $ad['category'] }}</p>
                                <select name="category" style="margin-bottom: 10px">
                                    <option value="house-stuff">House Stuff</option>
                                    <option value="Home-renting">Home Renting</option>
                                    <option value="High-techs">High Techs</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Clothes">Clothes</option>
                                    <option value="Tools">Tools</option>
                                    <option value="Vehicle">Vehicle</option>
                                    <option value="Pet">Pet</option>
                                </select>
                                <input name="id" value="{{$ad['id']}}" hidden >
                                <button class="btn btn-dark" type="submit">
                                    UPDATE
                                </button>
                            </form>
                            <form method="post" enctype="multipart/form-data" action="/ad/delete/{{$ad['id']}}">
                                @csrf
                                @method('DELETE')
                                <input name="id" value="{{$ad['id']}}">
                                <button class="btn btn-danger" type="submit">
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection

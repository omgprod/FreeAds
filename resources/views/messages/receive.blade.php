@extends('layouts.app')

@section('content')


    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messages Options</div>
                    <div class="card-body" style="margin-left:15% ">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Home</a></li>
                            <li class="active"><a href="#">Menu 1</a></li>
                            <li class="active"><a href="#">Menu 2</a></li>
                            <li class="active"><a href="#">Menu 3</a></li>
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($sender as $val)
                    {{$val}}
                @endforeach
                @foreach($receive as $val)
                    <div class="card">
                        @if(empty($receive))
                            <div class="card-header">No New Messages inbox</div>
                        @else
                            <div id="header-card" class="card-header">New Messages inbox</div>
                        @endif
                        <div id="message" class="card-body" style="margin-left:15% ">
                            @if(empty($receive))
                                <p>Empty box.</p>
                            @else
                                <p>Receive at <b></b> {{$val['created_at']}}</p>
                                <p><b>Sended by : </b> {{$val['sender_id']}}</p>
                                <p><b>subject :</b> {{$val['title']}}</p>
                                <p><b>content :</b> {{$val['content']}}</p>
                                <form name="id" value="{{$val->id}}" action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                    <button id="mask" class="btn btn-dark">MASK</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script type="text/javascript" >


        document.getElementById('message').style.visibility='hidden';

        $(document).ready(function(){
            texts = $('#message');
            texts.each(function() {
                $( this ).hide();
            });
        });


    </script>
@endsection

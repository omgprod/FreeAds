@extends('layouts.app')
@extends('layouts.flash')

@section('content')
    <div id="refresh-m-page"></div>
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messages Options</div>
                    <div class="card-body" style="margin-left:15% ">
                        <ul class="nav nav-inline">
                            <li><button id="unread-btn" class="btn btn-dark" style="margin: 5px">UNREAD</button></li>
                            <li><button id="send-btn" class="btn btn-dark" style="margin: 5px">SEND</button></li>
                            <li><button class="btn btn-dark" style="margin: 5px">OPTIONS</button></li>
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
                <div id="send" class="card">
                    <div class="card-header">Send a New Messages</div>
                    <div class="card-body" style="margin-left:15% ">
                        <form method='post' action='{{url('send')}}'>
                            @csrf
                            @method('POST')
                            <input name="sender_id" value="{{Auth::user()->id}}" hidden>
                            <b>Send To :</b>
                            <select name="receiver_id">
                                @foreach($list as $name)
                                    <option value="{{$name->id}}">{{$name->name}}</option>
                                @endforeach
                            </select>
                            <b>Subject :</b>
                            <input type="text" name="title" placeholder="Subject" required><br></br>
                            <textarea class="text" cols="fill" rows="10" name="content" placeholder="Content ..." required
                                      style="margin-top: 10px"></textarea><br>
                            <button type='submit' class="btn btn-dark">Send message</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="message-refresh" class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php $c = 1 ?>
                @foreach($messages as $val)
                    <div id="unread" class="card" style="margin-bottom: 10px">
                            <div id="header-card" class="card-header">
                                <p style="margin-right: 10px"><b> Sended by : </b>{{$val->user->name}}</p>
                                <p style="margin-right: 10px"><b>subject :</b> {{$val['title']}}</p>
                                <button name='{{$val['id']}}' id="read" type="button" class="btn btn-dark read" data-toggle="collapse" data-target="#demo{{$c}}">Read</button>
                                @if(($val['status'] == 0))
                                    <span class="badge badge-danger">unread</span>
                                    @else
                                    <span class="badge badge-info">read</span>
                                    @endif
                            </div>
                        <div id="message{{$c}}" class="card-body" style="margin-left:15%;">
                            @if(empty($receive))
                                <p>Empty box.</p>
                            @else
                                <div id="demo{{$c}}" class="collapse">
                                    <p><b>content :</b> {{$val['content']}}
                                    <p><b>Receive at</b> {{$val['created_at']}}</p>
                                    <form action="{{url('/messages', ['id' => $val->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input value="{{$val->id}}" hidden>
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </div>
                            @endif
                            <script>
                                $(document).ready(function () {
                                    $('#read').click(function() {
                                        console.log('coucou');
                                    })
                                });
                            </script>
                        </div>
                    </div>
                    <?php $c++ ?>
                @endforeach
            </div>
        </div>
    </div>
    <div id="refresh"></div>
    <div id="time">
        <?php echo date('H:i:s');?>
    </div>
@endsection


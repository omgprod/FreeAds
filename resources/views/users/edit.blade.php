@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <script language="JavaScript" type="text/javascript">
                    function ma_fonction(text){
                        $.ajax({
                            type: "POST",
                            url: "test9214b.php",
                            dataType: 'html',
                            cache: false,
                            success: function(html) {$('#toto').html(html)}
                        });
                    }
                </script>

                <p id="toto"></p>
                <input type="button" value="ok" onclick="ma_fonction()" />
    <div class="container">
        <div class="d-flex justify-content-center">
            <img src="{{$user->picture}}">
        </div>
    </div>
                <div class="card">
                    <div class="card-header">Edit your profil</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{route('users.update',["user" => $user->id])}}">
                            @csrf
                            @method('PATCH')
                            <p>Name & Email:</p>
                            <input type="text" name="name" value="{{ $user->name }}" placeholder="Name"/>
                            <input type="email" name="email" value="{{ $user->email }}" placeholder="Email"/>
                            <p style="margin-top: 5px">Password:</p>
                            <input type="password" name="password" placeholder="Password"/>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
                            <button class="btn btn-dark" type="submit">UPDATE</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Upload Picture Profile</div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data"
                              action="{{route('users.store', ['id', Auth::user()->id])}}">
                            @csrf
                            @method('POST')
                            <p>Add your picture must be a jpg, jpeg, png, gif</p>
                            <input type="file" name="picture" />
                            <button class="btn btn-dark" type="submit">UPLOAD</button>
                        </form>
                    </div>
                </div>

                <div class="card" style="margin-top: 20px">
                    <div class="card-header">Account delete</div>
                    <div class="card-body">
                        <form method="post" action="{{route('users.destroy',["user" => $user->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark" type="submit">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

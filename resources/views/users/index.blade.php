@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users added</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($users as $user)
                                {{ $user->id . " :" . $user->name }} <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

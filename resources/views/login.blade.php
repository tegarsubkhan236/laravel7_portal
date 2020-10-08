
@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>Login Page</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">

            <div class="card card-default">
                @include("message")
                <form role="form" action="{{route("login")}}" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label >Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Username">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop

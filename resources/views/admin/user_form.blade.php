@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-secondary">

                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                @include("message")

                <form action="{{route($route["name"],$route["params"])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label >Nama Lengkap</label>
                            <input type="text" name="nama" value="{{@$data['nama']}}" class="form-control"  placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label >Username</label>
                            <input type="text" name="username" value="{{@$data['username']}}" class="form-control"  placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" name="email" value="{{@$data['email']}}" class="form-control"  placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label >No HP</label>
                            <input type="text" name="no_hp" value="{{@$data['no_hp']}}" class="form-control"  placeholder="No HP">
                        </div>
                        <div class="form-group">
                            <label >Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10" rows="5">{{@$data['alamat']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="{{@$data['password']}}" class="form-control" placeholder="Password">
                        </div>
                        <label>Level</label>
                        @foreach(\App\Casts\UserLevel::list as $k => $v)
                        <div class="form-check">
                            <input type="radio" name="level" class="form-check-input" id="{{$k}}" value="{{$v}}">
                            <label class="form-check-label" for="{{$k}}">{{$k}}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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


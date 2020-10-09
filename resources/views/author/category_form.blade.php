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
                            <label >Name</label>
                            <input type="text" name="name" value="{{@$data['name']}}" class="form-control"  placeholder="Name">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
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


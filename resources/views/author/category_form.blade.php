@extends('layout.admin-base.main')

@section('title', $title)

@section('breadcrumb')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('author.home')}}">{{$level}}</a></li>
                <li class="breadcrumb-item"><a href="#">{{$title}}</a></li>
            </ol>
            </div>
        </div>
        </div>
    </section>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
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
        </div>
    </section>
@stop

@section('css')

@stop

@section('js')

@stop


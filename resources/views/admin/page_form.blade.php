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
                            <label >Title</label>
                            <input type="text" name="title" value="{{@$data['title']}}" class="form-control"  placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label >Is Commented</label>
                            <select name="is_commented" class="form-control">
                                <option hidden> ===== People can comment this page? ===== </option>
                                <option value="0"> No </option>
                                <option value="1"> Yes </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Content</label>
                            <textarea id="summernote" name="contents">{{@$data['contents']}}</textarea>
                        </div>
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
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@stop


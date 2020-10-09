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
                            <label >Content</label>
                            <textarea id="summernote" name="contents" class="form-control">
                                        {{@$data['contents']}}
                                    </textarea>
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
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">

@stop

@section('js')
    <script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@stop


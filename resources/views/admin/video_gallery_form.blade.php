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

                <form action="{{route($route["name"],$route["params"])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" name="name" value="{{@$data['name']}}" class="form-control"  placeholder="Name">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                @if(isset($data))
                                        <div class="col-md-3">
                                            <div class="card">
                                                <iframe width="420" height="345" src="{{@$data['url']}}" style="border:none;"></iframe>
                                            </div>
                                        </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label >URL Video</label>
                            <input type="text" name="url" value="{{@$data['url']}}" class="form-control"  placeholder="URL Video">
                        </div>
                        <div class="form-group">
                            <label >Type</label>
                            <select name="type" class="form-control">
                                <option value="mkv">mkv</option>
                                <option value="mp4">mp4</option>
                                <option value="3gp">3gp</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Description</label>
                            <textarea name="desc" class="form-control">{{@$data['desc']}}</textarea>
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


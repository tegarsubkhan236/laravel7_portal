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
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{$level}}</a></li>
                <li class="breadcrumb-item"><a href="#">{{$title}}</a></li>
                <li class="breadcrumb-item active"><a href="#">New Data</a></li>
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
                                    <label >Title</label>
                                    <input type="text" name="title" value="{{@$data['title']}}" class="form-control"  placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="select2" style="width: 100%;">
                                        @foreach ($category as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Content</label>
                                    <textarea id="summernote" name="contents">{{@$data['contents']}}</textarea>
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
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
@stop

@section('js')
    <!-- Summernote -->
    <script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            $('#summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
        $(function () {
            $('.select2').select2()
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
        })
    </script>
@stop


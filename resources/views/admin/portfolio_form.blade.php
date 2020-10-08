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
                            <label >Title</label>
                            <input type="text" name="title" value="{{@$data['title']}}" class="form-control"  placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label >Link Video</label>
                            <input type="text" name="videos" value="{{@$data['videos']}}" class="form-control"  placeholder="Videos">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                @if(isset($data))
                                    @foreach($data->portfolio_details()->get() as $images)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="{{asset($images->image)}}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input {{(isset($data->title)?null:"required")}} type="file" accept="image/*" name="image[]" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <label >Description</label>
                            <textarea name="desc" cols="20" rows="5" class="form-control">{{@$data['desc']}}</textarea>
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

@stop

@section('js')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@stop


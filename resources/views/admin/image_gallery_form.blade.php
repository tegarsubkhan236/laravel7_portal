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
                            <input type="text" name="name" value="{{@$data['name']}}" class="form-control"  placeholder="Title">
                        </div>
                        {{-- <div class="form-group">
                            <div class="row">
                                @if(isset($data))
                                    $image = $data['image'];
                                    $img = explode("|", $image);
                                    @foreach($img as $images)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img class="card-img-top" src="{{asset($images->image)}}">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input type="file" accept="image/*" name="image[]" class="form-control" multiple value="{{@$data['image']}}">
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

@stop


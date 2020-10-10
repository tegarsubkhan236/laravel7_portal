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
                        <div class="form-group">
                            <label >Link</label>
                            <input type="text" name="link" value="{{@$data['link']}}" class="form-control"  placeholder="Link">
                        </div>
                        <div class="form-group">
                            <label >Is Blank</label>
                            <select name="is_blank" class="form-control">
                                <option value="0">0</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Page Id</label>
                            <select name="page_id" class="form-control">
                                <option hidden> ==Select Page Id== </option>
                                <option value=""> No Page Id </option>
                                @foreach ($page_data as $page)
                                <option value="{{ $page->id }}" {{ @$data['page_id'] == $page->id ? "selected":""}}>{{ $page->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Parent Id</label>
                            <select name="parent_id" class="form-control">
                                <option hidden> ==Select Parent Id== </option>
                                <option value=""> No Parent Id </option>
                                @foreach ($menu_data as $menu)
                                <option value="{{ $menu->id }}" {{ @$data['parent_id'] == $menu->id ? "selected":""}}>{{ $menu->id }}</option>
                                @endforeach
                            </select>
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


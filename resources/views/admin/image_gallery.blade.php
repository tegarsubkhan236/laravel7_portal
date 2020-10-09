@extends('adminlte::page')

@section('title', $title)

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{route("image_gallery.create")}}" class="btn btn-success">
                            <li class="fa fa-plus"></li>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include("message")
                    <div class="table-responsive">
                        <table class="table-bordered table-hover table" id="dtable">
                            <thead class="thead-dark">
                            <th>No</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th style="text-align:center;">Aksi</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->created_at->format('d-m-Y')}}</td>
                                    <td>{{$row->updated_at->format('d-m-Y')}}</td>
                                    <td style="text-align:center;">
                                        <a href="{{route("image_gallery.edit",[$row->id])}}" class="btn btn-sm btn-warning">
                                            <li class="fa fa-eye"></li>
                                        </a>
                                        <form action="{{ route('image_gallery.delete', [$row->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $row->title }}" type="submit">
                                                <li class="fa fa-ban"></li>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $("#dtable").DataTable({

        });
    </script>
@stop

@extends('layout.admin-base.main')

@section('title', $title)

@section('breadcrumb')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>{{$title}}</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{$level}}</a></li>
                <li class="breadcrumb-item active"><a href="{{route('user')}}">{{$title}}</a></li>
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
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            @include("message")
                            <div class="table-responsive">
                                <table class="table-bordered table-hover table" id="dtable">
                                    <thead class="thead-dark">
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="text-align:center;">Aksi</th>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{($key+1)}}</td>
                                            <td>{{$row->title}}</td>
                                            <td>{{$row->created_at->format('d-m-Y')}}</td>
                                            <td>{{$row->updated_at->format('d-m-Y')}}</td>
                                            <td style="text-align:center;">
                                                <a href="{{route("portfolio.edit",[$row->id])}}" class="btn btn-sm btn-warning">
                                                    <li class="fa fa-eye"></li>
                                                </a>
                                                <form action="{{ route('portfolio.delete', [$row->id]) }}" method="post" class="d-inline">
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
        </div>
    </section>

@stop

@section('js')
    <script>
        $("#dtable").DataTable({

        });
    </script>
@stop


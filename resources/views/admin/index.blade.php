@extends('layout.admin-base.main')

@section('title', 'Dashboard')
@section('breadcrumb')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Administrator</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('message')
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$total_admin}}</h3>
                        <p>Admins</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$total_author}}</h3>
                        <p>Authors</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$total_announcement}}</h3>
                        <p>Announcements</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
@stop

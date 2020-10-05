@extends('layout.admin-base.main')

@section('title', 'Dashboard')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{$total_category}}</h3>
                        <p>Total Category</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('category')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{$total_article}}</h3>
                        <p>Total Article</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('article')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

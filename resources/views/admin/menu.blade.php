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
                        <a href="{{route("menu.create")}}" class="btn btn-success">
                            <li class="fa fa-plus"></li>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include("message")
                    <div class="row">
                        @foreach($data as $key => $val)
                            <div class="col-12">
                                <div class="card autocollapse">
                                    <div class="card-header clickable">
                                        <h3 class="card-title">{{$val->name}}</h3>
                                        @if($val->link)
                                            <h3 class="card-title float-right">{{$val->link}}</h3>
                                        @else
                                            <h3 class="card-title float-right">{{url("page/".$val->page->slug)}}</h3>
                                        @endif

                                    </div>
                                    @if($val->menus()->count() > 0)
                                    <div class="card-body">
                                        <div class="row">

                                                @foreach($val->menus()->orderBy("position","asc")->get() as $childKey => $childValue)
                                                    <div class="col-md-12">
                                                        <div class="card autocollapse">
                                                            <div class="card-header clickable">
                                                                <h3 class="card-title">
                                                                    {{$childValue->name}}
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach

                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .clickable
        {
            cursor: pointer;
        }
    </style>
@stop

@section('js')
    <script>
        $("#dtable").DataTable({

        });
        $(document).on('click', '.card div.clickable', function (e) {
            var $this = $(this); //Heading
            var $card = $this.parent('.card');
            var $card_body = $card.children('.card-body');
            var $display = $card_body.css('display');

            if ($display == 'block') {
                $card_body.slideUp();
            } else if($display == 'none') {
                $card_body.slideDown();
            }
        });

        $(document).ready(function(e){
            var $classy = '.card.autocollapse';

            var $found = $($classy);
            $found.find('.card-body').hide();
            $found.removeClass($classy);
        });
    </script>
@stop



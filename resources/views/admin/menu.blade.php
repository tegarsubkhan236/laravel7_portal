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
                                            <h3 class="card-title float-right">
                                                @if($val->link)
                                                    {{$val->link}}
                                                @else
                                                    {{url("page/".$val->page->slug)}}
                                                @endif
                                                <br><br>
                                                <a href="{{route("menu.edit",[$val->id])}}" class="btn btn-sm btn-warning">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                                <form action="{{ route("menu.delete", [$val->id]) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $val->name }}" type="submit">
                                                        <li class="fa fa-ban"></li>
                                                    </button>
                                                </form>
                                            </h3>
                                    </div>
                                    @if($val->menus()->count() > 0)
                                    <div class="card-body">
                                        <div class="row">
                                                @foreach($val->menus()->orderBy("position","asc")->get() as $childKey => $childValue)
                                                    <div class="col-md-12">
                                                        <div class="card autocollapse">
                                                            <div class="card-header clickable">
                                                                <h3 class="card-title float-left">
                                                                    {{$childValue->name}}
                                                                </h3>
                                                                <h3 class="card-title float-right">
                                                                    <a href="{{route("menu.edit",[$childValue->id])}}" class="btn btn-sm btn-warning">
                                                                        <li class="fa fa-edit"></li>
                                                                    </a>
                                                                    <form action="{{ route("menu.delete", [$childValue->id]) }}" method="post" class="d-inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $childValue->name }}" type="submit">
                                                                            <li class="fa fa-ban"></li>
                                                                        </button>
                                                                    </form>
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



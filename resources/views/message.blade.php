<div class="row">
    <div class="col-12">
            @if(count($errors->all()) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i>Error</h5>
                    @foreach($errors->all() as $item)
                    <p>{{$item}}</p>
                    @endforeach
                </div>
            @endif

            @if(session()->get("message") !== null)
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>Success</h5>
                    {{session()->get("message")}}
                </div>
            @endif
    </div>
</div>

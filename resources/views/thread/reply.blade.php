<div class="col-md-10 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
            <h6 class="flax"><a href="">{{ $reply->user->name }} reply </a></h6>
            <span> {{ $reply->created_at->diffForHumans()}}</span>
            </div>
        </div>

        <div class="panel-body">
            <div class="level">
                <p class="flax">  {{$reply->body}} </p>
               {!! Form::open(["url"=>"/threads/{channel}/{thread}/{replies}"]) !!}
                <button class="btn btn-default">
                    {{$reply->favorite->count()}}
                    <i class="glyphicon glyphicon-heart" style="color:#d62728"></i>
                </button>
                {!! Form::close() !!}

            </div>

        </div>
        <div class="panel-footer">
            @if(auth()->check())
                {!! Form::open(["url"=>"reply/{$reply->id}","method"=>"delete"]) !!}
                <button class="btn btn-link">
                    <i class="glyphicon glyphicon-remove" style="color:#dd1144;"></i>
                </button>
                {!! Form::close() !!}            @else
                <p class="alert alert-danger text-center">
                    Please Register to Reply ...
                </p>
            @endif
        </div>
    </div>
</div>

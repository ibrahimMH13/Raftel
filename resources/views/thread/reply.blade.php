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
               {!! Form::open() !!}
                <button class="btn btn-default">
                    <i class="glyphicon glyphicon-heart" style="color:#d62728"></i>
                </button>
                {!! Form::close() !!}

            </div>

        </div>
        <div class="panel-footer">

        </div>
    </div>
</div>

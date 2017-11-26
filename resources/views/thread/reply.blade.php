<div class="col-md-6 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <p>
            <h6><a href="">{{ $reply->user->name }} reply </a></h6>
            <span> {{ $reply->created_at->diffForHumans()}}</span>
            </p>
        </div>

        <div class="panel-body">
            {{$reply->body}}
        </div>
    </div>
</div>

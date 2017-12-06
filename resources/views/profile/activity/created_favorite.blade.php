<div class="panel panel-default">
    <div class="panel-heading"> has been favorite on

        <a href="">
            <div class="level">
                <h5 class="flax">
                    {{$activity->subject->favorite->body}}
                </h5>
                {{$activity->subject->created_at->diffForHumans()}}
            </div>
        </a>
    </div>
</div>
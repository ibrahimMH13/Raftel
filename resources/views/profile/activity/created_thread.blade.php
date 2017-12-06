<div class="panel panel-default">
    <div class="panel-heading"> has been puslised
        <a href="{{$activity->subject->path()}}">
        <div class="level">
            <h5 class="flax">
             {{$activity->subject->title}}
            </h5>
            {{$activity->subject->created_at->diffForHumans()}}
        </div>
        </a>
    </div>
</div>
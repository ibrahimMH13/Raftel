<div class="panel panel-default">
    <div class="panel-heading"> has been reply on {{$activity->subject->title}}

        <a href="">
            <div class="level">
                <h5 class="flax">
                    {{$activity->subject->thread->body}}
                </h5>
                {{$activity->subject->thread->created_at->diffForHumans()}}
            </div>
        </a>
    </div>
</div>
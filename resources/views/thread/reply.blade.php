<reply :attrs="{{$reply}}" inline-template>
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

                    <div v-if="editing" class="col-sm-5 flax">
                       <div class="form-group">
                           <textarea class="form-control" v-model="body"></textarea>
                       </div>
                        <button class="btn btn-xs btn-primary" @click="update">Update</button>
                        <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
                    </div>
                    <div v-else class="flax" v-text="body"></div>
                    <favorite :reply="{{$reply}}"></favorite>
                   {{--

                    {!! Form::open(["url"=>"/threads/{channel}/{thread}/{replies}"]) !!}
                    <button class="btn btn-default">
                        {{ $reply->favorite->count()?$reply->favorite->count():'' }}
                        <i class="glyphicon glyphicon-heart" style="color:#d62728"></i>
                    </button>
                    {!! Form::close() !!}
                   ---}}

                </div>

            </div>

            @can('update',$reply)
                <div class="panel-footer">
                    {!! Form::open(["url"=>"/replies/".$reply->id,"method"=>"delete"]) !!}
                    <button class="btn btn-link">
                        <i class="glyphicon glyphicon-remove" style="color:#dd1144;"></i>
                    </button>
                        <i class="btn btn-link glyphicon glyphicon-edit" @click="editing = true" style="color:#2e6da4;"></i>
                    {!! Form::close() !!}

                </div>
            @endcan
        </div>
    </div>
</reply>


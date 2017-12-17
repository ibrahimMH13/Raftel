@extends('layouts.app')

@section('content')
    <thread inline-template :initcount="{{$thread->reply_count}}">
        <div class="container" >

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                       Info About :.
                    </div>
                    <div class="panel-body">
                        <h6> <strong>published By:</strong> {{ $thread->user->name }}</h6>
                        <h6> <strong>Comment : </strong><i v-text="count"></i>  {{  str_plural('reply',$thread->reply_count)}}</h6>
                    </div>

                </div>
            </div>
            <div class="col-md-7 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                                <h5 class="flax">
                                    {{$thread->title}}
                                </h5>
                        <span> {{ $thread->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                    @can('update',$thread)
                        <div class="panel-footer">
                            {!! Form::open(["url"=>$thread->path(),"method"=>"delete"]) !!}
                            <button class="btn btn-link">
                                <i class="glyphicon glyphicon-remove" style="color:#dd1144;"></i>
                            </button>
                             {!! Form::close() !!}
                        </div>
                     @endcan
                </div>
                <div>
                    <replies :data="{{$thread->reply}}" @added="count++" @removed="count--"></replies>
                </div>
              </div>

        </div>
        </div>
    </thread>
 @endsection

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
                    <replies :data="{{$thread->reply}}" @removed="count--"></replies>
                </div>

                {{---
                 @forelse($replies as $reply)
                @include('thread.reply')
                 @empty
                <p class="text-center text-capitalize">Not Reply Yet,be the first !!</p>
                  @endforelse
               {{$replies->links()}}

                ---}}
             </div>
            @if(auth()->check())
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::open(["url"=>$thread->path()."/replies","method"=>"post"]) !!}
                    <textarea id="body" name="body" class="form-control" rows="5"></textarea>
                    <input type="submit" value="Reply" class="btn btn-default">
                    {!! Form::close() !!}
                </div>
            @else
                <p class="alert alert-danger text-center">
                    Please Register to Reply ...
                </p>
            @endif

        </div>
        </div>
    </thread>
 @endsection

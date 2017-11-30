@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                       Info About :
                    </div>
                    <div class="panel-body">
                        <h6> <strong>published By:</strong> {{ $thread->user->name }}</h6>
                        <h6> <strong>Comment : </strong>{{$thread->reply_count .' '.str_plural('reply',$thread->reply_count)}}</h6>
                    </div>

                </div>
            </div>
            <div class="col-md-7 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>

                        <span> {{ $thread->created_at->diffForHumans() }}</span>
                        </p>

                        {{$thread->title}}
                    </div>

                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>

                @forelse($replies as $reply)

                    @include('thread.reply')

                @empty
                    <p class="text-center text-capitalize">Not Reply Yet,be the first !!</p>
                @endforelse
                {{$replies->links()}}
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







    <br>
    <br>
 @endsection

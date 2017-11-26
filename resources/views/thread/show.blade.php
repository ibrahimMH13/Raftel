@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>
                        <h6> Pulished By {{ $thread->user->name }}</h6>
                        <span> {{ $thread->created_at->diffForHumans() }}</span>
                        </p>

                        {{$thread->title}}
                    </div>

                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            @forelse($thread->reply as $reply)
                @include('thread.reply')
            @empty
                <h1>Not Result to Show</h1>
            @endforelse
         </div>
        @if(auth()->check())
            <div class="col-md-8 col-md-offset-2">
                <form action="" method="post">
                    <textarea class="form-control" rows="5"></textarea>
                </form>
            </div>
                @else
            <p class="alert alert-danger text-center">
                Please Register to Reply ...
            </p>
        @endif
    </div>
    <br>
    <br>
    <br>
 @endsection

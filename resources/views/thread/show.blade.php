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
            @empty
                <h1>Not Result to Show</h1>
            @endforelse


        </div>
    </div>
@endsection

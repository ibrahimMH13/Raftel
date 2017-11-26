@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @forelse($threads as $thread)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                            <h6><a href="{{$thread->path()}}">Pulished By {{ $thread->user->name }}</a></h6>
                            <span> {{ $thread->created_at}}</span>
                            </p>

                            {{$thread->title}}
                        </div>

                        <div class="panel-body">
                            {{$thread->body}}
                        </div>
                    </div>
                </div>
                @empty
                    <h1>Not Result to Show</h1>
             @endforelse
        </div>
    </div>
@endsection

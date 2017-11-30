@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @forelse($threads as $thread)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <span class="flax">
                                 <a href="{{$thread->path()}}">Pulished By {{ $thread->user->name }}</a>
                                </span>
                            <span> {{ $thread->created_at->diffForHumans()}}</span>
                            </div>
                            <h4> {{$thread->title}} </h4>
                            </div>

                        <div class="panel-body">
                            {{$thread->body}}
                        </div>
                    </div>
                </div>
                @empty

                      <h2 style="padding-top: 15%" class="text-center text-info">Not Result to Show</h2>

             @endforelse
        </div>
    </div>
@endsection

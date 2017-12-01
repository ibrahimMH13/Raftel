@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           <div class="page-header">
                <div class="level">
                   <h2 class="flax">{{$user->name}}</h2>
                    {{$user->created_at->diffForHumans()}}
               </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{$thread->path()}}">
                                <div class="level">
                                    <h5 class="flax">
                                        {{ $thread->title }}
                                    </h5>
                                    {{$thread->created_at->diffForHumans()}}
                                </div>
                            </a>
                        </div>
                     </div>
                @endforeach
                {{ $threads->links() }}
            </div>
        </div>
    </div>
@endsection

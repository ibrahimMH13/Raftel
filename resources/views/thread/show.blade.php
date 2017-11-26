@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p>
                        <h6> Pulished By {{ $thread->user->name }}</h6>
                        <span> {{ $thread->created_at}}</span>
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

                <div class="col-md-6 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                            </p>

                        </div>

                        <div class="panel-body">
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection

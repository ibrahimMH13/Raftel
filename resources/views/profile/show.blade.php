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

                @forelse($activities as $date=>$activity)
                    <h3>{{$date}}</h3>
                    <div class="clearfix"></div>
                    @foreach($activity as $record)
                        @if(view()->exists("profile.activity.{$record->type}"))
                            @include("profile.activity.{$record->type}",['activity'=>$record])
                        @else
                            <p>NO Found THe page {{$record->type}}</p>
                        @endif

                    @endforeach
                @empty
                    <p> No there Activity Yet</p>
                @endforelse


            </div>
        </div>
    </div>
@endsection

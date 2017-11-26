@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Post</div>

                    <div class="panel-body">
                        {!! Form::open(["url"=>"","method"=>"post"]) !!}
                        <div class="form-group">
                            <div>
                                <label for="title">Title Post :</label>
                                <input type="text" id="title" class="form-control"/>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <div>
                                <textarea class="form-control" rows="10">

                                </textarea>
                             </div>
                        </div>
                        <div class="form-group">
                            <div>
                                {!! Form::submit('Publish',["class"=>"btn btn-primary"]) !!}
                              </div>
                        </div>
                     {!! Form::close() !!}
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection

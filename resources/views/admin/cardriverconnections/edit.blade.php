@extends('admin.core')
@section('content')
    <h2>{{$titleForm}}</h2>

    {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}

    <div class="form-group">
        {{Form::label('driver', 'Driver')}}
        {{Form::select('users', $users, $default_user, ['placeholder' => 'Pick a driver...'])}}
    </div>

    <div class="form-group">
        {{Form::label('car', 'Car')}}
        {{Form::select('carpark',$carpark , $default_car, ['placeholder' => 'Pick a car...'])}}
    </div>


    {{Form::submit(trans('app.save'), array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}




@endsection






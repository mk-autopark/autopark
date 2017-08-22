@extends('admin.core')
@section('content')
    <h2>{{trans('app.new_record')}}{{$titleForm}}</h2>

    {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}
    {{Form::label('manufacturer', 'Select car manufacturer')}}
    {{Form::select('size', array('volvo','toyota','audi'), null, ['placeholder' => 'Pick a manufacturer...'])}}
    {{Form::label('model', 'Select car model')}}
    {{Form::select('size', array('Pascale','Rhea','Sasha'), null, ['placeholder' => 'Pick a manufacturer...'])}}
    {{Form::label('average_fuel_consumption', 'enter car fuel consumption')}}
    {{Form::text('average_fuel_consumption')}}
    {{Form::label('license_plate', 'enter car license plate number')}}
    {{Form::text('license_plate')}}
    {{Form::submit(trans('app.save'), array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}




@endsection






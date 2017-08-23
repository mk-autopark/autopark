@extends('admin.core')
@section('content')
    <h2>{{$titleForm}}</h2>

    {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}

    <div class="form-group">
        {{Form::label('manufacturer', 'Select car manufacturer')}}
        {{Form::select('manufacturer', $manufacturer, $default_manufacturer, ['placeholder' => 'Pick a manufacturer...'])}}
    </div>

    <div class="form-group">
        {{Form::label('model', 'Select car model')}}
        {{Form::select('model', $model,$default_model , ['placeholder' => 'Pick a model...'])}}
    </div>

    <div class="form-group">
        {{Form::label('average_fuel_consumption', 'enter car fuel consumption')}}
        {{Form::text('average_fuel_consumption',$default_average_fuel)}}
    </div>

    <div class="form-group">
        {{Form::label('license_plate', 'enter car license plate number')}}
        {{Form::text('license_plate', $default_license_plate)}}
    </div>
    {{Form::submit(trans('app.save'), array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}




@endsection






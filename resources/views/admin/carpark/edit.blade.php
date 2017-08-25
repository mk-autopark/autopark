@extends('admin.core')
@section('content')
    <div class="container">
        <div class="row">
            <h2>{{$titleForm}}</h2>

            {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}


            {{Form::label('manufacturer', 'Select car manufacturer')}}
            {{Form::select('manufacturer', $manufacturer, $default_manufacturer, ['class' => 'form-control', 'placeholder' => 'Pick a manufacturer...'])}}



            {{Form::label('model', 'Select car model')}}
            {{Form::select('model', $model,$default_model , ['class' => 'form-control', 'placeholder' => 'Pick a model...'])}}



            {{Form::label('average_fuel_consumption', 'Enter car fuel consumption')}}
            {{Form::text('average_fuel_consumption',$default_average_fuel,['class' => 'form-control',])}}



            {{Form::label('license_plate', 'Enter car license plate number')}}
            {{Form::text('license_plate', $default_license_plate,['class' => 'form-control',])}}
            <br>
            <a class="btn btn-primary" href="{{$back}}">Back</a>
            {{Form::submit(trans('Save'), array('class' => 'btn btn-success')) }}
            {!! Form::close() !!}

        </div>
    </div>




@endsection






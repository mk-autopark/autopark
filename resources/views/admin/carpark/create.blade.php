@extends('admin.core')


@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}

    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h2>{{$titleForm}}</h2>

            {!! Form::open(['url' =>  $route, 'method' => 'post'])!!}

            {{Form::label('Manufacturer', 'Select car manufacturer')}}
            {{Form::select('manufacturer', $manufacturer, null, ['class' => 'form-control','placeholder' => 'Pick a manufacturer...'])}}

            {{Form::label('Model', 'Select car model')}}
            {{Form::select('model',$model , null, ['class' => 'form-control','placeholder' => 'Pick a manufacturer...'])}}

            {{Form::label('average_fuel_consumption', 'Enter car fuel consumption')}}
            {{Form::text('average_fuel_consumption', null,['class' => 'form-control'])}}

            {{Form::label('license_plate', 'Enter car license plate number')}}
            {{Form::text('license_plate', null,['class' => 'form-control'])}}
            <br>
            <a class="btn btn-primary" href="{{$back}}">Back</a>
            {{Form::submit(trans('Save'), array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}
        </div>
    </div>

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}


@endsection






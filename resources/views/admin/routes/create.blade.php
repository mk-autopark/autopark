@extends('admin.core')
@section('content')
    <div class="container">
        <div class="row">
            <h2>{{$titleForm}}</h2>


            {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}

            {{Form::label('conn', 'Select driver car connection')}}
            {{Form::select('model',$conn , null, ['class' => 'form-control','placeholder' => 'Pick a manufacturer...'])}}

            {{Form::label('entry_date', 'Enter date')}}
            {{Form::text('entry_date', null,['class' => 'form-control'])}}

            {{Form::label('distance', 'Enter distance')}}
            {{Form::text('distance', null,['class' => 'form-control'])}}
            <br>
            <a class="btn btn-primary" href="{{$back}}">Back</a>
            {{Form::submit(trans('Save'), array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}

        </div>
    </div>


@endsection





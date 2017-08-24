@extends('admin.core')
@section('content')
    <div class="container">
    <h2>{{$titleForm}}</h2>

    {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}

    <div class="form-group">
        {{Form::label('name', 'enter name')}}
        {{Form::text('name')}}
    </div>

    <div class="form-group">
        {{Form::label('surname', 'enter surname')}}
        {{Form::text('surname')}}
    </div>

    <div class="form-group">
        {{Form::label('password', 'enter password')}}
        {{Form::text('password')}}
    </div>

    <div class="form-group">
        {{Form::label('residential_address', 'enter residential_address')}}
        {{Form::text('residential_address')}}
    </div>
    <div class="form-group">
        {{Form::label('person_id', 'enter car person id')}}
        {{Form::text('person_id')}}
    </div>
    <div class="form-group">
        {{Form::label('phone', 'enter car phone')}}
        {{Form::text('phone')}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'enter email')}}
        {{Form::text('email')}}
    </div>
    {{Form::submit ('click' , array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    </div>



@endsection
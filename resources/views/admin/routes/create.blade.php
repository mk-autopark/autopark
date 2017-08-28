@extends('admin.core')
@section('content')
    <div class="container">
        <div class="row">
            <h2>{{$titleForm}}</h2>


            {!! Form::open(['url' =>  $route, 'method' => 'post', 'files' => true])!!}

            <div class='col-sm-6'>
                <div class="form-group">

                    {{Form::label('conn', 'Select driver car connection')}}
                    {{Form::select('conn',$conn , null, ['class' => 'form-control','placeholder' => 'Pick an id...'])}}

                </div>
            </div>


            {{--{{Form::label('entry_date', 'Enter date')}}
            {{Form::text('entry_date', null,['class' => 'form-control'])}}--}}


            <div class='col-sm-6'>
                <div class="form-group">
                    {{Form::label('distance', 'Enter distance')}}
                    {{Form::text('distance', null,['class' => 'form-control'])}}

                </div>
            </div>

            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input name="entry_date" type='text' class="form-control"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>


            <a class="btn btn-primary" href="{{$back}}">Back</a>
            {{Form::submit(trans('Save'), array('class' => 'btn btn-success')) }}

            {!! Form::close() !!}

        </div>
    </div>



@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:MM:SS'

            });

        });
    </script>
@endsection







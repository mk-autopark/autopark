@extends('admin.core')
@section('content')

    <div>
        <h2>{{$listName}}</h2>
    </div>

    @if(sizeof($list)>0)
        <table class="table table-condensed">
            <tr>
                @foreach($list[0] as $key => $value)
                    <th>{{$key}}</th>
                @endforeach



            </tr>
            @foreach($list as $record)
                    <tr id="{{$record['id']}}">
                    @foreach($record as $key=> $value)
                        <td >{{$value}}</td>
                    @endforeach
                        <td><a href="{{route($edit,$record['id'])}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a></td>
                        </td>
                        <td><a>
                                <button type="button" class="btn btn-primary" onclick = "deleteItem('{{route($delete,$record['id'])}}')">Delete</button>
                            </a></td>
                        </td>
                    </tr>
            @endforeach
        </table>
    @else
        <h2>{{ trans('app.no_data') }}</h2>
    @endif

@endsection


@section('scripts')
    {<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',

                success: function (response) {
                    console.log(response);
                    $('#' + response.id).remove();
                },
                error: function () {
                    console.log(response);
                    alert('ERROR')
                }
            });
        }
    </script>--}}
@endsection


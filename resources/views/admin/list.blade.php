@extends('admin.core')
@section('content')
    <div class="container">
        <form action="{{ route('app.carpark.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="searched_word"
                       placeholder="Search"><span class="input-group-btn">
                    <button type="submit" class="btn btn-default"><span
                                class="glyphicon glyphicon-search"></span></button></span>
            </div>
        </form>
        <div>
            <h2>{{$listName}}</h2>
            <a href="{{ route($create) }}">Create new {{$listName}}</a>
        </div>

        @if(sizeof($list)>0)
            <table class="table table-hover">
                <thead>
                <tr>

                    @foreach($list['data'][0] as $key => $value)
                        @if (!in_array($key, $ignore))
                            <th>{{$key}}</th>
                        @endif
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($list['data'] as $record)
                    <tr id="{{$record['id']}}">
                        @foreach($record as $key=> $value)
                            @if(!in_array($key, $ignore))
                                <td>{{$value}}</td>
                            @endif
                        @endforeach
                        <td><a href="{{route($edit,$record['id'])}}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a></td>
                        </td>
                        <td><a>
                                <button type="button" class="btn btn-primary"
                                        onclick="deleteItem('{{route($delete,$record['id'])}}')">Delete
                                </button>
                            </a></td>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $paginate->appends(['searched_word' => $search])->links() }}
            </div>
        @else
            <h2>No data!!!</h2>
        @endif
    </div>
@endsection


@section('scripts')
    {
    <script>
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
    </script>
@endsection


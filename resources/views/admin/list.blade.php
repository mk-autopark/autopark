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
                    <tr>
                    @foreach($record as $key=> $value)
                        <td>{{$value}}</td>
                    @endforeach
                        {{--<td><a href="{{route($edit,$record['id'])}}">
                                <button type="button" class="btn btn-primary">{{  trans('app.edit')}}</button>
                            </a></td>
                        </td>--}}
                    </tr>
            @endforeach
        </table>
    @else
        <h2>{{ trans('app.no_data') }}</h2>
    @endif

@endsection


@section('scripts')
    {{--<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function toggleActive(url, value) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    is_active: value
                },
                success: function (response) {
                    var $primary = $('#' + response.id).find('.btn-primary')
                    var $success = $('#' + response.id).find('.btn-success')
                    if (response.is_active === '1') {
                        $success.hide();
                        $primary.show();
                    }
                    else {
                        $success.show();
                        $primary.hide();
                    }
                }
            });
        }
        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('ERROR')
                }
            });
        }
    </script>--}}
@endsection


@extends('account.timekeeping.main')

@section('timekeeping')
<table class="table">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Total absent</th>
        </tr>
    </thead>
    <tbody>
        @if(count($off_list) > 0)
        @foreach($off_list as $off)
        <tr>
            <td>{{ $off['user_id'] }}</td>
            <td>{{ $off['name'] }}</td>
            <td>{{ $off['numbers'] }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="3" class="text-center">Nodata</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection

@extends('user.manager.timekeeping-search')

@section('search-month-content')
<tr>
    <td colspan="2" class="text-center text-uppercase text-danger">{{ $month_search }}</td>
</tr>
@foreach($off_list as $timekeep)
<tr>
    <td>{{ $timekeep['name'] }}</td>
    <td>{{ $timekeep['numbers'] }}</td>
</tr>
@endforeach
@endsection
@extends('user.manager.timekeeping-search')

@section('search-day-content')
<tr>
    <td colspan="2" class="text-center text-uppercase text-danger">{{ $day }}</td>
</tr>
@foreach($timekeeps as $timekeep)
<tr>
    <td>{{ $timekeep['name'] }}</td>
    <td>
        @if($timekeep->status == 'yes')
        <a href="#" class="badge badge-pill badge-success text-uppercase">
            {{ trans('messages.time.'.$timekeep->status) }}
        </a>
        @elseif($timekeep->status == 'no')
        <a href="#" class="badge badge-pill badge-danger text-uppercase">
            {{ trans('messages.time.'.$timekeep->status) }}
        </a>
        @endif
    </td>
</tr>
@endforeach
@endsection
@extends('account.timekeeping.main')

@section('timekeeping')
<table class="table">
    <thead>
        <tr>
            <th>{{ trans('bank.time.user_id') }}</th>
            <th>{{ trans('bank.time.name') }}</th>
            <th>{{ trans('bank.time.total') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($off_list) > 0)
        @foreach($off_list as $off)
        <tr>
            <td>
                <a class="text-primary font-weight-bolder" href="/detail-{{ $off['user_id'] }}-basic" target="_blank">{{ $off['user_id'] }}</a>
            </td>
            <td>{{ $off['name'] }}</td>
            <td>{{ $off['numbers'] }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="3" class="text-center">{{ trans('bank.time.nodata') }}</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection

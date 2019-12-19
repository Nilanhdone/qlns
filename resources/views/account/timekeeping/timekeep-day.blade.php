@extends('account.timekeeping.main')

@section('timekeeping')
<input type="hidden" value="{{ $day }}" id="selectedDay">
<table class="table">
    <thead>
        <tr>
            <th>{{ trans('bank.time.user_id') }}</th>
            <th>{{ trans('bank.time.status') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($timekeeps) > 0)
        @foreach($timekeeps as $timekeep)
        <tr>
            <td>
                <a class="text-primary font-weight-bolder" href="/detail-{{ $timekeep->user_id }}-basic" target="_blank">{{ $timekeep->user_id }}</a>
            </td>
            <td>{{ trans('bank.time.'.$timekeep->status) }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="2" class="text-center">{{ trans('bank.time.nodata') }}</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection

@section('custom_js')
<script type="text/javascript">
    $(document).ready(function() {
        var calendarTable = $("#calendarTable tr td");
        for (var i = 0; i < calendarTable.length; i++) {
            var td = calendarTable.eq(i);
            var day = td.find("a");
            if (day.html() == $("#selectedDay").val()) {
                td.attr("class", "text-danger font-weight-bold border border-danger");
            }
        }
    });
</script>
@endsection

<table class="table border border-primary">
    <thead>
        <tr>
            <th colspan="7" class="alert alert-primary text-right">
                <form method="GET" action="{{ route('get-calendar') }}">
                    <div class="form-group row">
                        <div class="col-5 offset-5">
                            <input type="month" class="form-control border-primary" name="month" value="{{ $value }}" max="{{ $max }}" required>
                        </div>

                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </th>
        </tr>
        <tr class="text-primary text-center">
            <th scope="col">{{ trans('messages.calendar.mon') }}</th>
            <th scope="col">{{ trans('messages.calendar.tue') }}</th>
            <th scope="col">{{ trans('messages.calendar.wed') }}</th>
            <th scope="col">{{ trans('messages.calendar.thu') }}</th>
            <th scope="col">{{ trans('messages.calendar.fri') }}</th>
            <th scope="col">{{ trans('messages.calendar.sat') }}</th>
            <th scope="col">{{ trans('messages.calendar.sun') }}</th>
        </tr>
    </thead>
    <tbody id="calendarTable">
        @foreach($calendar as $week)
        <tr class="text-primary text-center">
            @foreach($week as $day)
                @if($day == $today)
                    <td class="text-success font-weight-bold">
                        <a href="get-time-{{ $day }}-{{ $month }}-{{ $year }}">{{ $day }}</a>
                    </td>
                    @else
                    <td>
                        <a href="get-time-{{ $day }}-{{ $month }}-{{ $year }}">{{ $day }}</a>
                    </td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

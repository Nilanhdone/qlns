<table class="table">
    <thead>
        <tr>
            <th colspan="7" class="alert alert-primary text-right">{{ $now_day }}</th>
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
    <tbody>
        @foreach($calendar as $week)
        <tr class="text-primary text-center">
            @foreach($week as $day)
                <!-- chỉ có công việc đơn -->
                @if($aday_works != null && $days_works == null)
                    @if($day == $today)
                    <td id="day{{ $day }}" class="text-danger font-weight-bold">{{ $day }}</td>
                    @else
                    <td id="day{{ $day }}">{{ $day }}</td>
                    @endif
                    @foreach($aday_works as $work)
                        @if($day == (explode('-', $work->start_day)[2]))
                            <i class="workActice" name="day{{ $day }}" title="{{ $work->description }}"></i>
                        @endif
                    @endforeach
                <!-- chỉ có công việc kéo dài nhiều ngày -->
                @elseif($aday_works == null && $days_works != null)
                    @if($day == $today)
                    <td id="day{{ $day }}" class="text-danger font-weight-bold">{{ $day }}</td>
                    @else
                    <td id="day{{ $day }}">{{ $day }}</td>
                    @endif
                    @foreach($days_works as $work)
                        @if($day >= (explode('-', $work->start_day)[2]) && $day <= (explode('-', $work->end_day)[2]))
                            <i class="workActice" name="day{{ $day }}" title="{{ $work->description }}"></i>
                        @endif
                    @endforeach
                <!-- // có cả công việc đơn và kéo dài -->
                @elseif($aday_works != null && $days_works != null)
                    @if($day == $today)
                    <td id="day{{ $day }}" class="text-danger font-weight-bold">{{ $day }}</td>
                    @else
                    <td id="day{{ $day }}">{{ $day }}</td>
                    @endif
                     @foreach($days_works as $work)
                        @if($day >= (explode('-', $work->start_day)[2]) && $day <= (explode('-', $work->end_day)[2]))
                            <i class="workActice" name="day{{ $day }}" title="{{ $work->description }}"></i>
                        @endif
                    @endforeach
                    @foreach($aday_works as $work)
                        @if($day == (explode('-', $work->start_day)[2]))
                            <i class="workActice" name="day{{ $day }}" title="{{ $work->description }}"></i>
                        @endif
                    @endforeach
                <!-- không có công việc trong tháng -->
                @elseif($aday_works == null && $days_works == null)
                    @if($day == $today)
                    <td id="day{{ $day }}" class="text-danger font-weight-bold">{{ $day }}</td>
                    @else
                    <td id="day{{ $day }}">{{ $day }}</td>
                    @endif
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript">
    (function() {
        var day = document.getElementsByClassName("workActice");
        for (var i = 0; i < day.length; i++) {
            var name = day[i].getAttribute("name");
            var title = day[i].getAttribute("title");
            var today = document.getElementById(name);
            today.setAttribute("class", "border border-danger font-weight-bold font-italic");
            today.setAttribute("title", title);
        };
    })();
</script>

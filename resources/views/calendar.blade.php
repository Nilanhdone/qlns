<table class="table">
    <thead>
        <tr>
            <th colspan="7" class="alert alert-primary text-right">
                <input type="month" name="month">
            </th>
        </tr>
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
                @if($day == $today)
                    <td id="day{{ $day }}" class="text-success font-weight-bold">{{ $day }}</td>
                    @else
                    <td id="day{{ $day }}">{{ $day }}</td>
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
        var data_toggle = day[i].getAttribute("data-toggle");
        var data_target = day[i].getAttribute("data-target");
        var today = document.getElementById(name);
        today.setAttribute("class", "border border-danger font-weight-bold font-italic");
        today.setAttribute("title", title);
        today.setAttribute("data-toggle", data_toggle);
        today.setAttribute("data-target", data_target);
    };
})();
</script>

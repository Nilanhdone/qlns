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
                @if($aday_works == null && $days_works == null) <!-- không có công việc trong tháng -->
                    @if($day == $today)
                        <td id="day{{ $day }}" class="text-danger font-weight-bold">{{ $day }}</td>
                        @else
                        <td id="day{{ $day }}">{{ $day }}</td>
                    @endif
                @else <!-- có công việc trong tháng -->
                    @if($day == $today)
                        <td id="day{{ $day }}" class="text-danger font-weight-bold">{{ $day }}</td>
                    @else
                        <td id="day{{ $day }}">{{ $day }}</td>
                    @endif
                    @foreach($days_works as $work)
                        @if($day >= (explode('-', $work->start_day)[2]) && $day <= (explode('-', $work->end_day)[2]))
                            <i class="workActice" name="day{{ $day }}" title="{{ $work->description }}" data-toggle="modal" data-target="#workDetail{{ $day }}"></i>
                            <div class="modal fade" id="workDetail{{ $day }}" tabindex="-1" role="dialog" aria-labelledby="workDetail{{ $day }}Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="workDetail{{ $day }}Title">
                                                {{ $work->title }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $work->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @foreach($aday_works as $work)
                        @if($day == (explode('-', $work->start_day)[2]))
                            <i class="workActice" name="day{{ $day }}" title="{{ $work->description }}" data-toggle="modal" data-target="#workDetail{{ $day }}"></i>
                            <div class="modal fade" id="workDetail{{ $day }}" tabindex="-1" role="dialog" aria-labelledby="workDetail{{ $day }}Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="workDetail{{ $day }}Title">
                                                {{ $work->title }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $work->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
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

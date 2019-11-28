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
                @foreach($month_works as $month_work)
                    @if($day == $today)
                        <td class="font-weight-bold font-italic">{{ $day }}</td>
                    @elseif($day == (explode('-', $month_work->time)[2]))
                        <td class="border border-danger text-danger font-weight-bold font-italic" data-toggle="collapse" href="#calendar{{ $month_work->id }}" role="button" aria-expanded="false" aria-controls="calendar{{ $month_work->id }}">{{ $day }}</td>
                        <div class="collapse" id="calendar{{ $month_work->id }}">
                            <div class="card card-body alert alert-primary">
                                <p class="text-danger">{{ $month_work->title }}</p>
                                <p>{{ $month_work->description }}</p>
                            </div>
                        </div>
                    @else
                        <td>{{ $day }}</td>
                    @endif
                @endforeach
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

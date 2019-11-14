<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('messages.profile.work.from') }}</th>
            <th scope="col">{{ trans('messages.profile.work.to') }}</th>
            <th scope="col">{{ trans('messages.profile.work.department') }}</th>
            <th scope="col">{{ trans('messages.profile.work.work-unit') }}</th>
            <th scope="col">{{ trans('messages.profile.work.position') }}</th>
            <th scope="col">{{ trans('messages.profile.work.salary') }}</th>
            <th scope="col">{{ trans('messages.profile.work.insurance') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($works as $work)
        <tr>
            <td>{{ $work->start_day }}</td>
            @if($work->end_day == null)
            <td>{{ trans('messages.profile.work.now') }}</td>
            @else
            <td>{{ $work->end_day }}</td>
            @endif
            <td>{{ trans('messages.staff.main.'.$work->department.'.header') }}</td>
            <td>{{ trans('messages.staff.main.'.$work->department.'.'.$work->work_unit) }}</td>
            <td>{{ trans('messages.staff.detail.positions.'.$work->position) }}</td>
            <td>{{ $work->salary }}</td>
            <td>{{ $work->insurance_number }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
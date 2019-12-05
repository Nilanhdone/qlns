<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('messages.profile.work.from') }}</th>
            <th scope="col">{{ trans('messages.profile.work.to') }}</th>
            <th scope="col">{{ trans('messages.profile.work.branch') }}</th>
            <th scope="col">{{ trans('messages.profile.work.unit') }}</th>
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
            <td>{{ trans('messages.branchs.'.$work->branch) }}</td>
            <td>{{ trans('messages.units.'.$work->unit) }}</td>
            <td>{{ trans('messages.positions.'.$work->position) }}</td>
            <td>{{ $work->salary }}</td>
            <td>{{ $work->insurance_number }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

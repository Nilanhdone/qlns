<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.from') }}</th>
            <th scope="col">{{ trans('bank.create.to') }}</th>
            <th scope="col">{{ trans('messages.register.branch') }}</th>
            <th scope="col">{{ trans('messages.register.unit') }}</th>
            <th scope="col">{{ trans('messages.register.position') }}</th>
            <th scope="col">{{ trans('messages.register.salary') }}</th>
            <th scope="col">{{ trans('messages.register.insurance') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($processs as $process)
        <tr>
            <td>{{ $process->start_day }}</td>
            @if($process->end_day == null)
            <td>{{ trans('bank.create.now') }}</td>
            @else
            <td>{{ $process->end_day }}</td>
            @endif
            <td>{{ trans('messages.branchs.'.$process->branch) }}</td>
            <td>{{ trans('messages.units.'.$process->unit) }}</td>
            <td>{{ trans('messages.positions.'.$process->position) }}</td>
            <td>{{ $process->salary }}</td>
            <td>{{ $process->insurance }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

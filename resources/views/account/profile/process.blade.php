<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Branch</th>
            <th scope="col">Unit</th>
            <th scope="col">Position</th>
            <th scope="col">Salary</th>
            <th scope="col">Insurance number</th>
        </tr>
    </thead>
    <tbody>
        @foreach($processs as $process)
        <tr>
            <td>{{ $process->start_day }}</td>
            <td>{{ $process->end_day }}</td>
            <td>{{ trans('messages.branchs.'.$process->branch) }}</td>
            <td>{{ trans('messages.units.'.$process->unit) }}</td>
            <td>{{ trans('messages.positions.'.$process->position) }}</td>
            <td>{{ $process->salary }}</td>
            <td>{{ $process->insurance }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

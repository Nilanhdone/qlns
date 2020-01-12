<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.title-app') }}</th>
            <th scope="col">{{ trans('bank.create.reason') }}</th>
            <th scope="col">{{ trans('bank.create.start-day') }}</th>
            <th scope="col">{{ trans('bank.create.end-day') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $application)
        <tr>
            <td>{{ $application->title }}</td>
            <td>{{ $application->reason }}</td>
            <td>{{ $application->start_day }}</td>
            <td>{{ $application->end_day }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

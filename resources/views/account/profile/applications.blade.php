<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Reason</th>
            <th scope="col">Start day</th>
            <th scope="col">End day</th>
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

<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Government name</th>
            <th scope="col">Position</th>
        </tr>
    </thead>
    <tbody>
        @if(count($governments) > 0)
            @foreach($governments as $government)
            <tr>
                <td>{{ $government->start_day }}</td>
                <td>{{ $government->end_day }}</td>
                <td>{{ $government->unit }}</td>
                <td>{{ $government->position }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

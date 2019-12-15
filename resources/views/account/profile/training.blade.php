<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Training unit</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @if(count($trainings) > 0)
            @foreach($trainings as $training)
            <tr>
                <td>{{ $training->start_day }}</td>
                <td>{{ $training->end_day }}</td>
                <td>{{ $training->unit }}</td>
                <td>{{ $training->address }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

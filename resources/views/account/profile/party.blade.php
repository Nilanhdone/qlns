<table class="table">
    <thead>
        <tr>
            <th scope="col">Join day</th>
            <th scope="col">Unit</th>
            <th scope="col">Position</th>
        </tr>
    </thead>
    <tbody>
        @if(count($partys) > 0)
            @foreach($partys as $party)
            <tr>
                <td>{{ $party->join_day }}</td>
                <td>{{ $party->unit }}</td>
                <td>{{ $party->position }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

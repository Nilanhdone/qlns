<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Education unit</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach($educations as $education)
        <tr>
            <td>{{ $education->start_day }}</td>
            <td>{{ $education->end_day }}</td>
            <td>{{ $education->unit }}</td>
            <td>{{ $education->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

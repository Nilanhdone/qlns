<table class="table">
    <thead>
        <tr>
            <th scope="col">Infringe</th>
            <th scope="col">Year</th>
            <th scope="col">Organization</th>
            <th scope="col">Discipline method</th>
        </tr>
    </thead>
    <tbody>
        @if(count($infringes) > 0)
            @foreach($infringes as $infringe)
            <tr>
                <td>{{ $infringe->title }}</td>
                <td>{{ $infringe->year }}</td>
                <td>{{ $infringe->organization }}</td>
                <td>{{ $infringe->method }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

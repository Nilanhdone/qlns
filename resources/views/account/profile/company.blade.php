<table class="table">
    <thead>
        <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Company name</th>
            <th scope="col">Position</th>
        </tr>
    </thead>
    <tbody>
        @if(count($companys) > 0)
            @foreach($companys as $company)
            <tr>
                <td>{{ $company->start_day }}</td>
                <td>{{ $company->end_day }}</td>
                <td>{{ $company->unit }}</td>
                <td>{{ $company->position }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

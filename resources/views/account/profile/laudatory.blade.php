<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Year</th>
            <th scope="col">Organization</th>
            <th scope="col">Content</th>
        </tr>
    </thead>
    <tbody>
        @if(count($laudatorys) > 0)
            @foreach($laudatorys as $laudatory)
            <tr>
                <td>{{ $laudatory->title }}</td>
                <td>{{ $laudatory->year }}</td>
                <td>{{ $laudatory->organization }}</td>
                <td>{{ $laudatory->content }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

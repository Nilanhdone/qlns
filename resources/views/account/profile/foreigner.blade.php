<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Year of birth</th>
            <th scope="col">Relationship</th>
            <th scope="col">Nationality</th>
        </tr>
    </thead>
    <tbody>
        @if(count($foreigners) > 0)
            @foreach($foreigners as $foreigner)
            <tr>
                <td>{{ $foreigner->name }}</td>
                <td>{{ $foreigner->year }}</td>
                <td>{{ $foreigner->relationship }}</td>
                <td>{{ $foreigner->nationality }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No data</td>
            </tr>
        @endif
    </tbody>
</table>

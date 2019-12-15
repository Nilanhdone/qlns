<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Year of birth</th>
            <th scope="col">Relationship</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach($familys as $family)
        <tr>
            <td>{{ $family->name }}</td>
            <td>{{ $family->year }}</td>
            <td>{{ $family->relationship }}</td>
            <td>{{ $family->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

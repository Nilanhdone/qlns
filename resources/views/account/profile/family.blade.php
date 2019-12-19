<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.name') }}</th>
            <th scope="col">{{ trans('bank.create.year-birth') }}</th>
            <th scope="col">{{ trans('bank.create.relationship') }}</th>
            <th scope="col">{{ trans('bank.create.address') }}</th>
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

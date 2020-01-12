<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.family.name') }}</th>
            <th scope="col">{{ trans('bank.family.year') }}</th>
            <th scope="col">{{ trans('bank.family.relationship') }}</th>
            <th scope="col">{{ trans('bank.family.address') }}</th>
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

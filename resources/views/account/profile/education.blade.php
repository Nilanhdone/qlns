<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.from') }}</th>
            <th scope="col">{{ trans('bank.create.to') }}</th>
            <th scope="col">{{ trans('bank.create.level') }}</th>
            <th scope="col">{{ trans('bank.create.address') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($educations as $education)
        <tr>
            <td>{{ $education->start_day }}</td>
            <td>{{ $education->end_day }}</td>
            <td>{{ $education->level }}</td>
            <td>{{ $education->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

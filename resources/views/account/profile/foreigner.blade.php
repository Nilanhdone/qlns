<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.name') }}</th>
            <th scope="col">{{ trans('bank.create.year-birth') }}</th>
            <th scope="col">{{ trans('bank.create.relationship') }}</th>
            <th scope="col">{{ trans('bank.create.nationality') }}</th>
            <th scope="col">{{ trans('bank.create.time') }}</th>
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
                <td>{{ $foreigner->time }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

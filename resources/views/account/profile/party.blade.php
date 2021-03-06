<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.party.from') }}</th>
            <th scope="col">{{ trans('bank.party.to') }}</th>
            <th scope="col">{{ trans('bank.party.position') }}</th>
            <th scope="col">{{ trans('bank.party.other') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($partys) > 0)
            @foreach($partys as $party)
            <tr>
                <td>{{ $party->start_day }}</td>
                <td>{{ $party->end_day }}</td>
                <td>{{ $party->position }}</td>
                <td>{{ $party->other }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

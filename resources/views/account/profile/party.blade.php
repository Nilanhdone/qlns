<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.join') }}</th>
            <th scope="col">{{ trans('bank.create.unit') }}</th>
            <th scope="col">{{ trans('bank.create.position') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($partys) > 0)
            @foreach($partys as $party)
            <tr>
                <td>{{ $party->join_day }}</td>
                <td>{{ $party->unit }}</td>
                <td>{{ $party->position }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

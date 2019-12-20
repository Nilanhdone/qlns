<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.from') }}</th>
            <th scope="col">{{ trans('bank.create.to') }}</th>
            <th scope="col">{{ trans('bank.create.gov-name') }}</th>
            <th scope="col">{{ trans('bank.create.position') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($governments) > 0)
            @foreach($governments as $government)
            <tr>
                <td>{{ $government->start_day }}</td>
                <td>{{ $government->end_day }}</td>
                <td>{{ $government->unit }}</td>
                <td>{{ $government->position }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

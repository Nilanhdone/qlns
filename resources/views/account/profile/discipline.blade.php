<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.discipline.discipline') }}</th>
            <th scope="col">{{ trans('bank.discipline.year') }}</th>
            <th scope="col">{{ trans('bank.discipline.method') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($disciplines) > 0)
            @foreach($disciplines as $discipline)
            <tr>
                <td>{{ $discipline->discipline }}</td>
                <td>{{ $discipline->year }}</td>
                <td>{{ $discipline->method }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

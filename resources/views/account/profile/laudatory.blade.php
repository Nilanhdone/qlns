<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.title') }}</th>
            <th scope="col">{{ trans('bank.create.year') }}</th>
            <th scope="col">{{ trans('bank.create.method') }}</th>
            <th scope="col">{{ trans('bank.create.number') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($laudatorys) > 0)
            @foreach($laudatorys as $laudatory)
            <tr>
                <td>{{ $laudatory->title }}</td>
                <td>{{ $laudatory->year }}</td>
                <td>{{ $laudatory->method }}</td>
                <td>{{ $laudatory->number }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

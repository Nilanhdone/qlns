<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.laudatory.title') }}</th>
            <th scope="col">{{ trans('bank.laudatory.year') }}</th>
            <th scope="col">{{ trans('bank.laudatory.method') }}</th>
            <th scope="col">{{ trans('bank.laudatory.number') }}</th>
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

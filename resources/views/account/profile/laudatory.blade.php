<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.title') }}</th>
            <th scope="col">{{ trans('bank.create.year') }}</th>
            <th scope="col">{{ trans('bank.create.org') }}</th>
            <th scope="col">{{ trans('bank.create.content') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($laudatorys) > 0)
            @foreach($laudatorys as $laudatory)
            <tr>
                <td>{{ $laudatory->title }}</td>
                <td>{{ $laudatory->year }}</td>
                <td>{{ $laudatory->organization }}</td>
                <td>{{ $laudatory->content }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

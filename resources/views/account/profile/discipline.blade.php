<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.dis') }}</th>
            <th scope="col">{{ trans('bank.create.year') }}</th>
            <th scope="col">{{ trans('bank.create.org') }}</th>
            <th scope="col">{{ trans('bank.create.method') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($infringes) > 0)
            @foreach($infringes as $infringe)
            <tr>
                <td>{{ $infringe->infringe }}</td>
                <td>{{ $infringe->year }}</td>
                <td>{{ $infringe->organization }}</td>
                <td>{{ $infringe->method }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

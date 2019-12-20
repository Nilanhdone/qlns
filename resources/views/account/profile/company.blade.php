<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.create.from') }}</th>
            <th scope="col">{{ trans('bank.create.to') }}</th>
            <th scope="col">{{ trans('bank.create.com-name') }}</th>
            <th scope="col">{{ trans('bank.create.position') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($companys) > 0)
            @foreach($companys as $company)
            <tr>
                <td>{{ $company->start_day }}</td>
                <td>{{ $company->end_day }}</td>
                <td>{{ $company->unit }}</td>
                <td>{{ $company->position }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

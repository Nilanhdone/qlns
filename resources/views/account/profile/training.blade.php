<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ trans('bank.training.from') }}</th>
            <th scope="col">{{ trans('bank.training.to') }}</th>
            <th scope="col">{{ trans('bank.training.course') }}</th>
            <th scope="col">{{ trans('bank.training.address') }}</th>
        </tr>
    </thead>
    <tbody>
        @if(count($trainings) > 0)
            @foreach($trainings as $training)
            <tr>
                <td>{{ $training->start_day }}</td>
                <td>{{ $training->end_day }}</td>
                <td>{{ $training->course }}</td>
                <td>{{ $training->address }}</td>
            </tr>
            <tr>
                <td colspan="4">{{ $training->content }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">{{ trans('bank.create.nodata') }}</td>
            </tr>
        @endif
    </tbody>
</table>

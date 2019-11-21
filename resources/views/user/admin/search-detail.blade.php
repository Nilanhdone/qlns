@extends('user.admin.search')

@section('search-detail')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Postion</th>
            <th scope="col">Unit</th>
            <th scope="col">Birthday</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staffs as $staff)
        <tr>
            <td>{{ $staff->name }}</td>
            <td>{{ trans('messages.positions.'.$staff->position) }}</td>
            <td>{{ trans('messages.units.'.$staff->unit) }}</td>
            <td>{{ $staff->birthday }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
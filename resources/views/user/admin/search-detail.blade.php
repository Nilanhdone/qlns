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
        <tr>
            @foreach($staffs as $staff)
            <th>{{ $staff->name }}</th>
            <th>{{ trans('messages.positions.'.$staff->position) }}</th>
            <th>{{ trans('messages.units.'.$staff->unit) }}</th>
            <th>{{ $staff->birthday }}</th>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection
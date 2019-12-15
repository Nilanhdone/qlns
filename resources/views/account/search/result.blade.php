@extends('account.search.search')

@section('result')
<div class="card-header text-primary font-weight-bolder">
    {{ count($users) }} results
</div>

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Unit</th>
                <th>Position</th>
                <th>Phone number</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <a class="text-primary font-weight-bolder" href="/detail-{{ $user->user_id }}-basic" target="_blank">
                        {{ $user->name}}
                    </a>
                </td>
                <td>{{ trans('messages.units.'.$user->unit) }}</td>
                <td>{{ trans('messages.positions.'.$user->position) }}</td>
                <td>{{ $user->phone}}</td>
                <td>{{ $user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
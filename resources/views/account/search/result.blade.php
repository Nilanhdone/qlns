@extends('account.search.search')

@section('result')
<div class="card-header text-primary font-weight-bolder">
    <div class="row">
        <div class="col-auto mr-auto">
            {{ count($users) }} results
        </div>
        <div class="col-auto">
            <form method="POST" action="{{ route('export') }}">
                @csrf

                @foreach($users as $user)
                <input type="hidden" name="user_name[]" value="{{ $user->name }}">
                <input type="hidden" name="user_unit[]" value="{{ $user->unit }}">
                <input type="hidden" name="user_position[]" value="{{ $user->position }}">
                <input type="hidden" name="user_phone[]" value="{{ $user->phone }}">
                <input type="hidden" name="user_email[]" value="{{ $user->email }}">
                @endforeach
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-file-export"></i>
                </button>
            </form>
        </div>
    </div>
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
                <th></th>
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
                <td>
                    <a href="update-{{ $user->user_id }}" class="badge badge-success text-uppercase" target="_blank">Update</a>
                    <a href="/show-app-{{ $user->user_id }}" class="badge badge-primary text-uppercase" target="_blank">Application</a>
                    @include('account.search.delete-modal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
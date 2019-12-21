@extends('account.search.search')

@section('result')
<div class="card-header text-primary font-weight-bolder">
    <div class="row">
        <div class="col-auto mr-auto">
            {{ trans('bank.search.results', [ 'users' => count($users), 'male' => $male, 'female' => $female ]) }}
        </div>
        <div class="col-auto">
            <form method="POST" action="{{ route('export') }}">
                @csrf

                @foreach($users as $user)
                <input type="hidden" name="user_id[]" value="{{ $user->user_id }}">
                @endforeach
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-file-export mr-2"></i>{{ trans('bank.search.export') }}
                </button>
            </form>
        </div>
    </div>
</div>

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>{{ trans('bank.search.name') }}</th>
                <th>{{ trans('bank.search.work-unit') }}</th>
                <th>{{ trans('bank.search.position') }}</th>
                <th>{{ trans('bank.search.phone') }}</th>
                <th>{{ trans('bank.search.email') }}</th>
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
                    <a href="update-{{ $user->user_id }}" class="badge badge-success text-uppercase" target="_blank">{{ trans('bank.search.update') }}</a>
                    <a href="/show-app-{{ $user->user_id }}" class="badge badge-primary text-uppercase" target="_blank">{{ trans('bank.search.application') }}</a>
                    @include('account.search.delete-modal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
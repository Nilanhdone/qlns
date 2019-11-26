@extends('layouts.app')

@section('content')
<div class="card" style="margin-right: 100px; margin-left: 100px;">
    <div class="card-header text-primary text-uppercase">
        <div class="row">
            <div class="col-2 text-danger">
                <a href="{{ url()->previous() }}">
                    <i class="fas fa-reply mr-2"></i>{{ trans('messages.profile.menu.back') }}
                </a>
            </div>
            <div class="col-8">
                {{ trans('messages.home.profile') }}
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ trans('messages.profile.work.from') }}</th>
                    <th scope="col">{{ trans('messages.profile.work.to') }}</th>
                    <th scope="col">{{ trans('messages.profile.work.branch') }}</th>
                    <th scope="col">{{ trans('messages.profile.work.unit') }}</th>
                    <th scope="col">{{ trans('messages.profile.work.position') }}</th>
                    <th scope="col">{{ trans('messages.profile.work.salary') }}</th>
                    <th scope="col">{{ trans('messages.profile.work.insurance') }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($works as $key => $work)
                <tr>
                    <td>{{ $work->start_day }}</td>
                    @if($work->end_day == null)
                    <td>{{ trans('messages.profile.work.now') }}</td>
                    @else
                    <td>{{ $work->end_day }}</td>
                    @endif
                    <td>{{ trans('messages.branchs.'.$work->branch) }}</td>
                    <td>{{ trans('messages.units.'.$work->unit) }}</td>
                    <td>{{ trans('messages.positions.'.$work->position) }}</td>
                    <td>{{ $work->salary }}</td>
                    <td>{{ $work->insurance_number }}</td>
                    <td><a href="edit-work-detail/{{ $work->user_id }}/{{ $work->id }}/{{ $key }}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
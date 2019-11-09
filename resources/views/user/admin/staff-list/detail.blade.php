@extends('user.admin.staff-list.main')

@section('detail')
    <h3  class="text-uppercase text-danger mb-2 text-monospace">
        {{ trans('messages.staff.main.departments.'.$unit) }}
    </h3>
    <div style="border-bottom: 2px solid rgba(0,0,0,.125);"></div>
    <ul class="list-unstyled">
        @foreach($users as $user)
        <div class="row mt-2">
            <div class="col-7">
                <li class="media">
                    <img src="{{asset('img/avatar').'/'.$user->avatar}}" class="mr-3" height="100px" width="70px">

                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ $user->name }}</h5>
                        <p class="font-italic">{{ trans('messages.staff.detail.positions.'.$user->position) }}</p>
                    </div>
                </li>
            </div>
            <div class="col-5 text-uppercase">
                <a href="#" class="badge badge-pill badge-info">
                    {{ trans('messages.staff.detail.button.detail') }}
                </a>
                <a href="#" class="badge badge-pill badge-success">
                    {{ trans('messages.staff.detail.button.update') }}
                </a>
                <a href="#" class="badge badge-pill badge-primary">
                    {{ trans('messages.staff.detail.button.edit') }}
                </a>
                <a href="#" class="badge badge-pill badge-danger">
                    {{ trans('messages.staff.detail.button.delete') }}
                </a>
            </div>
        </div>
        @endforeach
    </ul>
@endsection
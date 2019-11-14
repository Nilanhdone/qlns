@extends('user.admin.staff-list.main')

@section('detail')
    <h3  class="text-uppercase text-danger mb-2 text-monospace">
        {{ trans('messages.staff.main.'.$staff_department.'.'.$unit) }}
    </h3>
    <div style="border-bottom: 2px solid rgba(0,0,0,.125);"></div>
    <ul class="list-unstyled">
        @foreach($staffs as $staff)
        <div class="row mt-2">
            <div class="col-6">
                <li class="media">
                    <img src="{{asset('img/avatar').'/'.$staff->avatar}}" class="mr-3" height="100px" width="70px">

                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ $staff->name }}</h5>
                        <p class="font-italic">{{ trans('messages.staff.detail.positions.'.$staff->position) }}</p>
                    </div>
                </li>
            </div>
            <div class="col-6 text-uppercase">
                <a href="detail/{{ $staff->user_id }}" class="badge badge-pill badge-info">
                    {{ trans('messages.staff.detail.button.detail') }}
                </a>
                <a href="update/{{ $staff->user_id }}" class="badge badge-pill badge-success">
                    {{ trans('messages.staff.detail.button.update') }}
                </a>
                <a class="badge badge-pill badge-primary" data-toggle="collapse" href="#edit{{ $staff->user_id }}" role="button" aria-expanded="false" aria-controls="edit">
                    {{ trans('messages.staff.detail.button.edit') }}
                </a>
                <a href="#" class="badge badge-pill badge-danger">
                    {{ trans('messages.staff.detail.button.delete') }}
                </a>
                <div class="collapse" id="edit{{ $staff->user_id }}">
                    <div class="card" style="width: 50%">
                        <a href="edit-basic/{{ $staff->user_id }}">
                            {{ trans('messages.staff.detail.button.edit-basic') }}
                        </a>
                        <a href="edit-work/{{ $staff->user_id }}">
                            {{ trans('messages.staff.detail.button.edit-work') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </ul>
@endsection
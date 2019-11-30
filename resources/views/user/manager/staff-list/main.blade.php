@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3  class="text-uppercase text-danger mb-2">
                <p>{{ trans('messages.units.'.$unit) }}</p>
                <small>{{ trans('messages.branchs.'.$branch) }}</small>
            </h3>
        </div>

        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($staffs as $staff) 
                @if($staff->status == 1)
                <div class="row mt-2">
                    <div class="col-6">
                        <li class="media">
                            <img src="{{asset('img/avatar').'/'.$staff->avatar}}" class="mr-3" height="100px" width="70px">

                            <div class="media-body">
                                @if($staff->status == 1)
                                <h5 class="mt-0 mb-1 text-primary">{{ $staff->name }}</h5>
                                @elseif($staff->status == 0)
                                <h5 class="mt-0 mb-1 text-danger">{{ $staff->name }}</h5>
                                @endif
                                <p class="font-italic">{{ trans('messages.positions.'.$staff->position) }}</p>
                            </div>
                        </li>
                    </div>
                    <div class="col-6">
                        <a href="mana-detail-{{ $staff->user_id }}" class="badge badge-pill badge-info">
                            {{ trans('messages.staff.detail.button.detail') }}
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
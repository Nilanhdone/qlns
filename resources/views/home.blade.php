@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header text-primary text-uppercase"><i class="fas fa-calendar-alt mr-2"></i>
                {{ trans('messages.home.work-calendar') }}
            </div>
            <div class="card-body">
                <div class="row">
                    @include('calendar')
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header text-primary text-uppercase"><i class="fas fa-plane-departure mr-2"></i>
                {{ trans('messages.home.vacation-leave') }}
            </div>
            <div class="card-body">
                @foreach($vacations as $vacation)
                <div class="row">
                    <div class="col-8">
                        <p class="text-uppercase">{{ $vacation->title }}</p>
                    </div>
                    <div class="col-4">
                        @if($vacation->status == 'waiting')
                            <span class="badge badge-pill badge-primary">
                                {{ trans('messages.home.waiting') }}
                                <i class="fas fa-clock ml-2"></i>
                            </span>
                            @elseif($vacation->status == 'accepted')
                            <span class="badge badge-pill badge-success">
                                {{ trans('messages.home.accepted') }}
                                <i class="fas fa-check ml-2"></i>
                            </span>
                            @elseif($vacation->status == 'rejected')
                                <span class="badge badge-pill badge-danger">
                                {{ trans('messages.home.rejected') }}
                                <i class="fas fa-times ml-2"></i>
                            </span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

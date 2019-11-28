@extends('layouts.app')

@section('content')
<!-- Profile -->
<div style="float: left; width: 70%;">
    <div class="card ml-2">
        <div class="card-header text-primary text-uppercase"><i class="fas fa-user mr-2"></i>
            {{ trans('messages.home.profile') }}
        </div>
        <div class="card-body">
            @include('user.profile.menu')
        </div>
    </div>
</div> <!-- End profile -->

<!-- Vacation leave - Work Calendar -->
<div style="float: right; width: 30%;">
    <div class="card mr-2">
        <!-- Vacation leave -->
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
        </div> <!-- End vacation leave -->

        <div class="w-100"></div>

        <!-- Work calendar -->
        <div class="card-header text-primary text-uppercase"><i class="fas fa-calendar-alt mr-2"></i>
            {{ trans('messages.home.work-calendar') }}
        </div>
        <div class="card-body">
            <div class="row">
                @include('calendar')
            </div>
        </div> <!-- End work calendar -->
    </div>
</div>
@endsection

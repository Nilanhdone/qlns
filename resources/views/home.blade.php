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
            @foreach($work_calendars as $work_calendar)
            <div class="row">
                <div class="col-8">
                    <p class="text-uppercase text-danger font-weight-bold" data-toggle="modal" data-target="#workCalendarModal">
                        {{ $work_calendar->title }}
                    </p>
                    <small class="text-danger">{{ trans('messages.home.see-more') }}</small>
                    <div class="modal fade" id="workCalendarModal" tabindex="-1" role="dialog" aria-labelledby="workCalendarModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="workCalendarModalTitle">
                                        {{ $work_calendar->title }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $work_calendar->time }}</p>
                                    <p>{{ $work_calendar->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        {{ trans('messages.home.modal-close') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <p>{{ $work_calendar->time }}</p>
                </div>
            </div>
            @endforeach
        </div> <!-- End work calendar -->
    </div>
</div>
@endsection

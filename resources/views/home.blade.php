@extends('layouts.app')

@section('content')
<div class="container">
<div style="float: left; width: 60%;">
    <div class="card ml-2">
        <div class="card-header text-primary text-uppercase"><i class="fas fa-user mr-2"></i>
            {{ trans('messages.home.profile') }}
        </div>
        <div class="card-body">
            @include('user.profile.menu')
        </div>
    </div>
</div>
<div style="float: right; width: 40%;">
    <div class="card mr-2">
        <div class="card-header text-primary text-uppercase"><i class="fas fa-plane-departure mr-2"></i>
            {{ trans('messages.home.vacation-leave') }}
        </div>
        <div class="card-body">
            Đơn xin nghỉ phép ...
            <span class="badge badge-pill badge-primary">
                {{ trans('messages.home.waiting') }}<i class="fas fa-clock ml-2"></i>
            </span>
            <span class="badge badge-pill badge-success">
                {{ trans('messages.home.accepted') }}<i class="fas fa-check ml-2"></i>
            </span>
            <span class="badge badge-pill badge-danger">
                {{ trans('messages.home.rejected') }}<i class="fas fa-exclamation-circle ml-2"></i>
            </span>
        </div>

        <div class="w-100"></div>

        <div class="card-header text-primary text-uppercase"><i class="fas fa-calendar-alt mr-2"></i>
            {{ trans('messages.home.work-calendar') }}
        </div>
        <div class="card-body"></div>
    </div>
</div></div>
@endsection

@extends('layouts.app')

@section('content')
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
        <div class="card-body"></div>

        <div class="w-100"></div>

        <div class="card-header text-primary text-uppercase"><i class="fas fa-calendar-alt mr-2"></i>
            {{ trans('messages.home.work-calendar') }}
        </div>
        <div class="card-body"></div>
    </div>
</div>
@endsection

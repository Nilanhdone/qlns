@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        {{ trans('bank.time.header') }}
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                @include('account.timekeeping.calendar')
            </div>
            <div class="col">
                @yield('timekeeping')
            </div>
        </div>
    </div>
</div>
@endsection

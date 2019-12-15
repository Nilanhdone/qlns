@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
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

    <div class="col-6">
    </div>
</div>
@endsection

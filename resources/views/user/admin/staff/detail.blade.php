@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-primary text-uppercase">
        <div class="row">
            <div class="col-2 text-danger">
                <a href="/staff{{ $staff->unit }}">
                    <i class="fas fa-chevron-left mr-2"></i>{{ trans('messages.profile.menu.back') }}
                </a>
            </div>
            <div class="col-8">
                {{ trans('messages.home.profile') }}
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link text-uppercase text-primary active" id="basicInfor-tab" data-toggle="tab" href="#basicInfor" role="tab" aria-controls="basicInfor" aria-selected="true">
                {{ trans('messages.profile.menu.basic') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase text-primary" id="workProcess-tab" data-toggle="tab" href="#workProcess" role="tab" aria-controls="workProcess" aria-selected="false">
                {{ trans('messages.profile.menu.work') }}
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="basicInfor" role="tabpanel" aria-labelledby="basicInfor-tab">
            @include('user.admin.staff.detail-basic')
        </div>
        <div class="tab-pane fade" id="workProcess" role="tabpanel" aria-labelledby="workProcess-tab">
            @include('user.admin.staff.detail-work')
        </div>
    </div>
</div>
@endsection

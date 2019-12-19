@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-uppercase text-primary font-weight-bolder">
        <div class="row">
            <div class="col-auto mr-auto">
                Profile
            </div>
            <div class="col-auto">
                <a href="/print-{{ $user->user_id }}" class="btn btn-primary" target="_blank">
                    <i class="fas fa-print"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <div class="row">
                    <img src="{{asset('img/avatar').'/'.$user->avatar}}" class="rounded mx-auto d-block" height="200" width="120">
                </div>

                <div class="w-100"></div>

                <div class="row nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">
                        Basic Information
                    </a>
                    <a class="nav-link" id="edu-his-tab" data-toggle="pill" href="#edu-his" role="tab" aria-controls="edu-his" aria-selected="false">
                        Education History
                    </a>
                    <a class="nav-link" id="train-his-tab" data-toggle="pill" href="#train-his" role="tab" aria-controls="train-his" aria-selected="false">
                        Traning History
                    </a>
                    <a class="nav-link" id="com-his-tab" data-toggle="pill" href="#com-his" role="tab" aria-controls="com-his" aria-selected="false">
                        Company History
                    </a>
                    <a class="nav-link" id="gov-his-tab" data-toggle="pill" href="#gov-his" role="tab" aria-controls="gov-his" aria-selected="false">
                        Government History
                    </a>
                    <a class="nav-link" id="party-his-tab" data-toggle="pill" href="#party-his" role="tab" aria-controls="party-his" aria-selected="false">
                        Join Party History
                    </a>
                    <a class="nav-link" id="family-tab" data-toggle="pill" href="#family" role="tab" aria-controls="family" aria-selected="false">
                        Family Relationship
                    </a>
                    <a class="nav-link" id="foreigner-tab" data-toggle="pill" href="#foreigner" role="tab" aria-controls="foreigner" aria-selected="false">
                        Foreigner Relationship
                    </a>
                    <a class="nav-link" id="laudatory-tab" data-toggle="pill" href="#laudatory" role="tab" aria-controls="laudatory" aria-selected="false">
                        Laudatory
                    </a>
                    <a class="nav-link" id="discipline-tab" data-toggle="pill" href="#discipline" role="tab" aria-controls="discipline" aria-selected="false">
                        Discipline
                    </a>
                    <a class="nav-link" id="process-tab" data-toggle="pill" href="#process" role="tab" aria-controls="process" aria-selected="false">
                        Work Process
                    </a>
                    <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                        Application
                    </a>
                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                        @include('account.profile.basic-info')
                    </div>
                    <div class="tab-pane fade" id="edu-his" role="tabpanel" aria-labelledby="edu-his-tab">
                        @include('account.profile.education')
                    </div>
                    <div class="tab-pane fade" id="train-his" role="tabpanel" aria-labelledby="train-his-tab">
                        @include('account.profile.training')
                    </div>
                    <div class="tab-pane fade" id="com-his" role="tabpanel" aria-labelledby="com-his-tab">
                        @include('account.profile.company')
                    </div>
                    <div class="tab-pane fade" id="gov-his" role="tabpanel" aria-labelledby="gov-his-tab">
                        @include('account.profile.government')
                    </div>
                    <div class="tab-pane fade" id="party-his" role="tabpanel" aria-labelledby="party-his-tab">
                        @include('account.profile.party')
                    </div>
                    <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                        @include('account.profile.family')
                    </div>
                    <div class="tab-pane fade" id="foreigner" role="tabpanel" aria-labelledby="foreigner-tab">
                        @include('account.profile.foreigner')
                    </div>
                    <div class="tab-pane fade" id="laudatory" role="tabpanel" aria-labelledby="laudatory-tab">
                        @include('account.profile.laudatory')
                    </div>
                    <div class="tab-pane fade" id="discipline" role="tabpanel" aria-labelledby="discipline-tab">
                        @include('account.profile.discipline')
                    </div>
                    <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="process-tab">
                        @include('account.profile.process')
                    </div>
                    <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                        @include('account.profile.applications')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

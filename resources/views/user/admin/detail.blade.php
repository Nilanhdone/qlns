@extends('layouts.app')

@section('content')
        <div class="card" style="margin-right: 100px; margin-left: 100px;">
            <div class="card-header text-primary text-uppercase">
                <div class="row">
                    <div class="col-2 text-danger">
                        <a href="http://127.0.0.1:8000/{{ $staff->work_unit }}">
                            <i class="fas fa-reply mr-2"></i>{{ trans('messages.profile.menu.back') }}
                        </a>
                    </div>
                    <div class="col-8">
                        {{ trans('messages.home.profile') }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <div class="text-center mb-2">
                            <img src="{{asset('img/avatar').'/'.$staff->avatar}}" class="img-thumbnail" width="150px" height="150px">
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pill-basic-tab" data-toggle="pill" href="#basic" role="tab" aria-controls="v-pill-basic" aria-selected="true">
                            {{ trans('messages.profile.menu.basic') }}</a>
                            <a class="nav-link" id="v-pill-work-tab" data-toggle="pill" href="#work" role="tab" aria-controls="v-pill-work" aria-selected="false">
                            {{ trans('messages.profile.menu.work') }}</a>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="v-pill-basic-tab">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.user-id') }}</th>
                                            <td>{{ $staff->user_id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.name') }}</th>
                                            <td>{{ $staff->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.gender') }}</th>
                                            @if(($staff->gender) == 'male')
                                            <td>{{ trans('messages.profile.basic.male') }}</td>
                                            @elseif(($staff->gender) == 'female')
                                            <td>{{ trans('messages.profile.basic.female') }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.birthday') }}</th>
                                            <td>{{ $staff->birthday }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.identify') }}</th>
                                            <td>{{ $staff->identify_number }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.degree') }}</th>
                                            @if(($staff->degree) == 'bachelor')
                                            <td>{{ trans('messages.profile.basic.bachelor') }}</td>
                                            @elseif(($staff->degree) == 'engineer')
                                            <td>{{ trans('messages.profile.basic.engineer') }}</td>
                                            @elseif(($staff->degree) == 'master')
                                            <td>{{ trans('messages.profile.basic.master') }}</td>
                                            @elseif(($staff->degree) == 'post-doctor')
                                            <td>{{ trans('messages.profile.basic.post-doctor') }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.phone') }}</th>
                                            <td>{{ $staff->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.email') }}</th>
                                            <td>{{ $staff->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.nationality') }}</th>
                                            <td>{{ $staff->nationality }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.religion') }}</th>
                                            <td>{{ $staff->religion }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.hometown') }}</th>
                                            <td>{{ $staff->hometown}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ trans('messages.profile.basic.address') }}</th>
                                            <td>{{ $staff->address }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="v-pill-work-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ trans('messages.profile.work.from') }}</th>
                                            <th scope="col">{{ trans('messages.profile.work.to') }}</th>
                                            <th scope="col">{{ trans('messages.profile.work.department') }}</th>
                                            <th scope="col">{{ trans('messages.profile.work.work-unit') }}</th>
                                            <th scope="col">{{ trans('messages.profile.work.position') }}</th>
                                            <th scope="col">{{ trans('messages.profile.work.salary') }}</th>
                                            <th scope="col">{{ trans('messages.profile.work.insurance') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($works as $work)
                                        <tr>
                                            <td>{{ $work->start_day }}</td>
                                            @if($work->end_day == null)
                                            <td>{{ trans('messages.profile.work.now') }}</td>
                                            @else
                                            <td>{{ $work->end_day }}</td>
                                            @endif
                                            <td>{{ trans('messages.staff.main.'.$work->department.'.header') }}</td>
                                            <td>{{ trans('messages.staff.main.'.$work->department.'.'.$work->work_unit) }}</td>
                                            <td>{{ trans('messages.staff.detail.positions.'.$work->position) }}</td>
                                            <td>{{ $work->salary }}</td>
                                            <td>{{ $work->insurance_number }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
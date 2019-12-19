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

    @if(Session::has('success'))
        <div class="alert alert-success"><i class="fas fa-check"></i>
            {!! Session::get('success') !!}
        </div>
    @endif

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <div class="row">
                    <img src="{{asset('img/avatar').'/'.$user->avatar}}" class="rounded mx-auto d-block" height="200" width="120">
                </div>

                <div class="w-100"></div>
                
                <div class="row nav flex-column nav-pills" id="menuList">
                    <a class="nav-link" href="/detail-{{ $user_id }}-basic">
                        Basic Information
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-educations">
                        Education History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-trainings">
                        Traning History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-companys">
                        Company History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-governments">
                        Government History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-partys">
                        Join Party History
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-familys">
                        Family Relationship
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-foreigners">
                        Foreigner Relationship
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-laudatorys">
                        Laudatory
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-disciplines">
                        Discipline
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-processs">
                        Process
                    </a>
                    <a class="nav-link" href="/detail-{{ $user_id }}-applications">
                        Application
                    </a>
                </div>
            </div>
            <div class="col-10">
                <div>
                    @yield('component')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
